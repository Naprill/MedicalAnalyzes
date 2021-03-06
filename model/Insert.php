<?php

/**
 * Created by PhpStorm.
 * User: ніна
 * Date: 10.03.2017
 * Time: 20:30
 */
class Insert
{
    public $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function insertAnalysis($name){
        $this->database->insertOrDeleteRow("INSERT INTO Analyzes(analysis_name) VALUES (?)",[
            $name
        ]);
        $newAnalysisId = $this->database->getLastInsertId();
        return $newAnalysisId;
    }


    public function insertParameter($name, $unit, $normMin, $normMax, $analysisId){
        $this->database->insertOrDeleteRow("INSERT INTO Parameters(parameter_name, unit, norm_min, norm_max, analysis_id) VALUES (?,?,?,?,?)",[
            $name,
            $unit,
            $normMin,
            $normMax,
            $analysisId
        ]);
        $newParameterId = $this->database->getLastInsertId();
        return $newParameterId;
    }

    public function insertPatient($name, $age, $sex, $address){
        $this->database->insertOrDeleteRow("INSERT INTO Patients(patient_name, birthdate, sex, address_id) VALUES (?, ?, ?, ?)", [
                $name,
                $age,
                $sex,
                $address
            ]);
        $newPatientId = $this->database->getLastInsertId();
        return $newPatientId;
    }

    public  function insertOrder($patientId, $diagnosis, $analysis, $coverDiagnosis, $completionDate, $laboratory, $treatment){
        //echo $orderId;
        $this->database->insertOrDeleteRow("INSERT INTO Orders(patient_id, diagnosis_id, analysis_id, cover_diagnosis, completion_date, laboratory, treatment) VALUES (?, ?, ?, ?, ?, ?, ?)",[
            $patientId,
            $diagnosis,
            $analysis,
            $coverDiagnosis,
            $completionDate,
            $laboratory,
            $treatment
        ]);
        $newOrderId = $this->database->getLastInsertId();
        return $newOrderId;
    }


    public function insertResult($parameterId, $orderId, $result){
        $this->database->insertOrDeleteRow("INSERT INTO Results(parameter_id, order_id, result) VALUES (?, ?, ?)",[
            $parameterId,
            $orderId,
            $result
        ]);
    }

    public function insertDiagnosis($diagnosis_name){
        $this->database->insertOrDeleteRow("INSERT INTO Diagnoses(diagnosis_name) VALUES (?)",[
            $diagnosis_name
        ]);
    }
}