<?php
require_once '../config.php';
require_once '../dao/providersDaoMS.php';
session_start();

if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $provider = new providersDAOMS($pdo);

    $providerModel = new provider;
    $providerModel->setId($_GET['id']);

    $provider->deleteProvider($providerModel);
    $_SESSION['successMessage'] = "O fonecedor " . $_GET['id'] . " foi apagado com sucesso.";
} else {
    $_SESSION['indexErrorMessage'] = "Não foram inseridos todos os dados necessários.";
}

header('Location: ../index.php');
die();
