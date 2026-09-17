#/usr/bin/bash

# =============================================================================
# Script de sauvegarde WordPress pour Devilbox - Fichiers et BD
# =============================================================================
#
# Ce script doit être exécuté dans le shell de Devilbox (pour avoir accès
# à mysql) et doit se trouver dans le dossier dev de votre projet.
#
# La copie de sauvegarde sera produite dans /shared/httpd/
# 
# À la question "Enter password" (demandée deux fois), il s'agit du mot
# de passe MySQL (aucun si vous n'avez pas sécurisé votre BD).
# =============================================================================

# ------------------------------------------
# Configuration à adapter selon votre projet
# ------------------------------------------
NOM_DOSSIER="wp2545857" # le nom du dossier du site (sans le .lvh.me)
BD_NOM="wp2545857" # Nom de la BD MySQL
BD_USER="root" # User MySQL
BD_PASSWORD="" # Mot de passe MySQL (si vous n'entrez rien, il va le demander chaque fois)

# ----------------------------------------------
# Configuration (à ne pas modifier, normalement)
# ----------------------------------------------
CHEMIN_SITE="/shared/httpd/$NOM_DOSSIER/htdocs"
BD_HOST="127.0.0.1"
BD_PORT="3306"
BACKUP_DIR="/shared/httpd/" # Dossier de destination des sauvegardes
TIMESTAMP=$(date +"%Y%m%d_%H%M%S") # Pour le nom de la sauvegarde (date et heure)
BACKUP_NOM="${BD_NOM}_${TIMESTAMP}" # Pour le nom complet
TEMP_DIR="/tmp/${BACKUP_NOM}"

# Couleurs pour les messages à l'écran (pour le "wow!")
ROUGE='\033[0;31m'
VERT='\033[0;32m'
JAUNE='\033[1;33m'
BLEU='\033[0;34m'
SCOUL='\033[0m' # Sans couleur

# =============================================================================
# Fonctions utilitaires
# =============================================================================

log_info() {
    echo -e "${BLEU}[INFO]${SCOUL} $1"
}

log_succes() {
    echo -e "${VERT}[SUCCESS]${SCOUL} $1"
}

log_avert() {
    echo -e "${JAUNE}[WARNING]${SCOUL} $1"
}

log_erreur() {
    echo -e "${ROUGE}[ERROR]${SCOUL} $1"
}

nettoyage() {
    if [ -d "$TEMP_DIR" ]; then
        log_info "Nettoyage des fichiers temporaires..."
        rm -rf "$TEMP_DIR"
    fi
}

# Gestion des signaux pour nettoyer en cas d'interruption
trap nettoyage EXIT INT TERM

# =============================================================================
# Vérifications préliminaires
# =============================================================================

verif_requis() {
    log_info "Vérification des prérequis..."

    # Vérifier si le dossier WordPress existe
    if [ ! -d "$CHEMIN_SITE" ]; then
        log_erreur "Le dossier WordPress n'existe pas: $CHEMIN_SITE"
        exit 1
    fi

    # Vérifier si mysqldump est installé
    if ! command -v mysqldump &> /dev/null; then
        log_erreur "mysqldump n'est pas installé. Installez-le avec: sudo apt-get install mysql-client"
        exit 1
    fi

    # Vérifier si tar est installé
    if ! command -v tar &> /dev/null; then
        log_erreur "tar n'est pas installé"
        exit 1
    fi

    # Vérifier la connexion à la base de données
    if ! mysql -h"$BD_HOST" -P"$BD_PORT" -u"$BD_USER" -p"$BD_PASSWORD" -e "USE $BD_NOM;" 2>/dev/null; then
        log_erreur "Impossible de se connecter à la base de données $BD_NOM"
        log_info "Vérifiez que Devilbox est démarré et que MySQL est accessible. Vérifiez que le mot de passe MYSQL que vous avez entré est bon."
        exit 1
    fi

    log_succes "Tous les prérequis sont satisfaits"
}

# =============================================================================
# Fonctions de sauvegarde
# =============================================================================

creer_dossiers() {
    log_info "Création des dossiers de sauvegarde..."

    # Créer le dossier de sauvegarde s'il n'existe pas
    mkdir -p "$BACKUP_DIR"

    # Créer le dossier temporaire
    mkdir -p "$TEMP_DIR"

    log_succes "Dossiers créés avec succès"
}

backup_bd() {
    log_info "Sauvegarde de la base de données $BD_NOM..."

    local BD_backup_file="$TEMP_DIR/database.sql"

    # Exporter la base de données
    if mysqldump -h"$BD_HOST" -P"$BD_PORT" -u"$BD_USER" -p"$BD_PASSWORD" \
        --single-transaction \
        --routines \
        --triggers \
        --lock-tables=false \
        "$BD_NOM" > "$BD_backup_file" 2>/dev/null; then

        log_succes "Base de données sauvegardée: $(du -h "$BD_backup_file" | cut -f1)"
    else
        log_erreur "Erreur lors de la sauvegarde de la base de données"
        exit 1
    fi
}

backup_fichiers() {
    log_info "Sauvegarde des fichiers WordPress..."

    local fichiers_backup_dir="$TEMP_DIR/wordpress_files"
    mkdir -p "$fichiers_backup_dir"

    # Copier tous les fichiers WordPress
    if cp -r "$CHEMIN_SITE"/* "$fichiers_backup_dir/" 2>/dev/null; then
        # Calculer la taille des fichiers
        local taille=$(du -sh "$fichiers_backup_dir" | cut -f1)
        log_succes "Fichiers WordPress sauvegardés: $taille"
    else
        log_erreur "Erreur lors de la sauvegarde des fichiers WordPress"
        exit 1
    fi
}

creer_backup_info() {
    log_info "Création du fichier d'informations..."

    local info_file="$TEMP_DIR/backup_info.txt"

    cat > "$info_file" << EOF
=============================================================================
INFORMATIONS DE SAUVEGARDE WORDPRESS
=============================================================================

Date de création: $(date)
Site WordPress: $CHEMIN_SITE
Base de données: $BD_NOM
Serveur MySQL: $BD_HOST:$BD_PORT

Contenu de la sauvegarde:
- wordpress_files/ : Tous les fichiers du site WordPress
- database.sql : Export complet de la base de données
- backup_info.txt : Ce fichier informatif

=============================================================================
RESTAURATION
=============================================================================

Pour restaurer cette sauvegarde:

1. Extraire l'archive:
   tar -xzf $(basename "$BACKUP_DIR/${BACKUP_NOM}.tar.gz")

2. Restaurer les fichiers:
   cp -r wordpress_files/* /chemin/vers/nouveau/site/

3. Restaurer la base de données (dans le shell de Devilbox):

     Créer la base de données (si elle est absente):

     mysql -h mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS nouvelle_base;"

     Restaurer la base de données:

     mysql -h mysql -u root -p nouvelle_base < database.sql

=============================================================================
EOF

    log_succes "Fichier informatif créé"
}

creer_archive() {
    log_info "Création de l'archive compressée..."

    local archive_path="$BACKUP_DIR/${BACKUP_NOM}.tar.gz"

    # Créer l'archive tar.gz
    if tar -czf "$archive_path" -C "$TEMP_DIR" .; then
        local archive_taille=$(du -h "$archive_path" | cut -f1)
        log_succes "Archive créée avec succès: $archive_path ($archive_taille)"

        # Afficher le chemin complet de l'archive
        log_info "Chemin complet: $(realpath "$archive_path")"
    else
        log_erreur "Erreur lors de la création de l'archive"
        exit 1
    fi
}

# =============================================================================
# Fonction principale
# =============================================================================

main() {
    echo -e "${BLEU}"
    echo "============================================================================="
    echo "                    SCRIPT DE SAUVEGARDE WORDPRESS DEVILBOX"
    echo "============================================================================="
    echo -e "${SCOUL}"

    log_info "Début de la sauvegarde à $(date)"

    # Exécuter les étapes de sauvegarde
    verif_requis
    creer_dossiers
    backup_bd
    backup_fichiers
    creer_backup_info
    creer_archive

    echo -e "${VERT}"
    echo "============================================================================="
    echo "                         SAUVEGARDE TERMINÉE AVEC SUCCÈS"
    echo "============================================================================="
    echo -e "${SCOUL}"

    log_succes "Sauvegarde terminée à $(date)"
    log_info "Archive disponible dans: $BACKUP_DIR"
}

# =============================================================================
# Exécution du script
# =============================================================================

# Vérifier si le script est exécuté directement (pas sourcé)
if [[ "${BASH_SOURCE[0]}" == "${0}" ]]; then
    main "$@"
fi