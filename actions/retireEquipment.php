<?php 
require_once '../config.php';
require_once '../dao/equipmentsDaoMS.php';
require_once '../dao/categorysDaoMS.php';

if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $equipments = new equipmentsDAOMS($pdo);

    $categorys = new categorysDAOMS($pdo);
    $categoryId = $categorys->getRetiredCategoryId();

    if(!$categoryId) {
        $_SESSION['indexErrorMessage'] = "Não existe nenhum tipo registrado como 'Abatido'";
        header('Location: ../index.php');
        die();
    }

    $newEquipment = new equipments();
    $newEquipment->setId($_GET['id']);

    $equipments->setEquipmentAsRetired($newEquipment, $categoryId);

    $_SESSION['successMessage'] = "O processo de emprestimo do equipamento "  .  $internalCode . " foi criado com sucesso.";
    header('Location: ../index.php');
    die();
} else {
    $_SESSION['indexErrorMessage'] = "Não foram inseridos todos os dados necessários.";
}

header('Location: ../index.php');
die();