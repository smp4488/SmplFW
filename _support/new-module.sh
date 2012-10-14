#!/bin/bash

# Create a new module using templates

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
PROJ_ROOT=${DIR%/*}

if [[ $1 != "" ]]; then
	MODULE_NAME=$1
else
	while [[ ${MODULE_NAME} == "" ]]; do
		echo "Enter the name of the module you'd like to create:"
		read MODULE_NAME
	done
fi

NEW_MODULE_DIR=${PROJ_ROOT}/modules/${MODULE_NAME}
TEMPLATE_DIR=${PROJ_ROOT}/_support/moduletemplates

if [[ -d ${NEW_MODULE_DIR} ]]; then
	echo "Error: Module already exists at ${NEW_MODULE_DIR}; exiting..."
	exit 65
else
	echo "Creating new module from templates..."
	mkdir -p ${NEW_MODULE_DIR}/actions
	mkdir -p ${NEW_MODULE_DIR}/models
	mkdir -p ${NEW_MODULE_DIR}/templates

	cat ${TEMPLATE_DIR}/actions.php.template | sed -e "s/\[\[MODULENAME\]\]/${MODULE_NAME}/g" | > ${NEW_MODULE_DIR}/actions/${MODULE_NAME}Actions.php
	cat ${TEMPLATE_DIR}/models.php.template | sed -e "s/\[\[MODULENAME\]\]/${MODULE_NAME}/g" > ${NEW_MODULE_DIR}/models/${MODULE_NAME}Models.php
	cat ${TEMPLATE_DIR}/template.php.template | sed -e "s/\[\[MODULENAME\]\]/${MODULE_NAME}/g" > ${NEW_MODULE_DIR}/templates/${MODULE_NAME}Success.php

	echo "New module created at ${NEW_MODULE_DIR}!"
fi
