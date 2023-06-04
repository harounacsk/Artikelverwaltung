<?php
/**
 * ab PHP 8
 */
enum Roles:string{
    case USER="USER";
    case ADMIN="USER ADMIN";
    case SUPPERADMIN="USER SUPERADMIN";
}