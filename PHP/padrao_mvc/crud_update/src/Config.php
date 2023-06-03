<?php
namespace src;

class Config {
    const BASE_DIR = '/mvc/public';     // caminho do servidor até a pasta 'public'

    const DB_DRIVER = 'mysql';      // configurações do banco de dados
    const DB_HOST = 'localhost';
    const DB_DATABASE = 'test';
    CONST DB_USER = 'root';
    const DB_PASS = '';

    const ERROR_CONTROLLER = 'ErrorController';
    const DEFAULT_ACTION = 'index';
}