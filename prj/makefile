
# ----------------------------------------------#
# settings
# ----------------------------------------------#
PHP=php
SQLITE=sqlite3

# Turn echo off on all make commands
.SILENT: all

# ----------------------------------------------#
# targets
# ----------------------------------------------#
all:
	make help

run: ## Run development web server
	$(PHP) -S 127.0.0.1:7000 -t public

initdirs: ## Create database and upload directories
	$(PHP) bin/init.php

initdb: ## Use SQLite3 command line tool to create database
	$(SQLITE) database/las.db < bin/mk_version_table.sql

cleanuploads: ## remove all files from the uploads directory
	ls -ltr uploads/
	rm uploads/*

help: ## This help dialog.
	@IFS=$$'\n' ; \
	help_lines=(`fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' | sed -e 's/##/:/'`); \
	printf "%-30s %s\n" "target" "help" ; \
	printf "%-30s %s\n" "------" "----" ; \
	for help_line in $${help_lines[@]}; do \
	    IFS=$$':' ; \
	    help_split=($$help_line) ; \
	    help_command=`echo $${help_split[0]} | sed -e 's/^ *//' -e 's/ *$$//'` ; \
	    help_info=`echo $${help_split[2]} | sed -e 's/^ *//' -e 's/ *$$//'` ; \
	    printf '\033[36m'; \
	    printf "%-30s %s" $$help_command ; \
	    printf '\033[0m'; \
	    printf "%s\n" $$help_info; \
	done


