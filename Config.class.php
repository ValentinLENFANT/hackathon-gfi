<?php
class Config {
    /* display error */
    const DEV_MODE = true;
    /* die on error */
    const DIE_MODE = false;
    /*Urls & path*/
    const URL = '';
    //const URL = 'http://localhost/fournine/';
    //const PATH = 'C:\xampp\htdocs\fournine';
    const PATH = 'c:\wamp\www\hackathon-gfi';

    /*Base path*/
    const CONTROLLER_PATH = 'controller';
    const CORE_PATH = 'core';
    const VIEW_PATH = 'view';
    const TEMPLATE_PATH = 'view/template';
    const MODEL_PATH = 'model';
    const HELPER_PATH = 'helper';
    const LOG_DIR = 'media/log';
    const CSS_DIR = 'media/css';
    const UPLOAD_FOLDER = 'media/imgFiles';
    /*Database data*/
    const DB_HOST = 'localhost';
    const DB_NAME = 'enigma';
    const DB_USER = 'root';
    const DB_PASSWORD = ''; 
}