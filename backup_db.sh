#!/bin/bash

# Database connection parameters
DB_HOST="127.0.0.1"
DB_USER="navtech"
DB_PASSWORD="navtech"
DB_NAME="asset_issuance_db"

# Backup directory
BACKUP_DIR="./"

# Date format for backup file
DATE_FORMAT=$(date +"%Y%m%d_%H%M%S")

# Backup file name
BACKUP_FILE="$BACKUP_DIR/asset_issuance_db_$DATE_FORMAT.sql"

# Perform database backup
mysqldump --host=$DB_HOST --user=$DB_USER --password=$DB_PASSWORD $DB_NAME > $BACKUP_FILE

# Check if backup was successful
if [ $? -eq 0 ]; then
    echo "Database backup successful. Backup file: $BACKUP_FILE"
else
    echo "Error: Database backup failed."
fi
