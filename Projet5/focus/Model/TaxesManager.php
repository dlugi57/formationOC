<?php
namespace Model;

//require_once("Model/Manager.php");

class TaxesManager extends Manager
{
  public function getTaxes()
  {
    $db = $this->dbConnect();
    $req = $db->query('SELECT * ,Month(tax_date) as month, Year(tax_date) as year  FROM taxes ORDER BY tax_date ASC');

    return $req;
  }

  public function getTaxe($taxeId)
  {


    $db = $this->dbConnect();
    $req = $db->prepare('SELECT * ,Month(tax_date) as month, Year(tax_date) as year  FROM taxes WHERE tax_id = ?');
    $req->execute(array($taxeId));
    $taxe = $req->fetch();

    return $taxe;
  }



  public function updateTaxe($tax_id, $tax_date, $tax_declare, $tax_paid, $tax_description)
  {
    $db = $this->dbConnect();
    $request = $db->prepare('UPDATE taxes SET tax_date = :tax_date, tax_declare = :tax_declare, tax_paid = :tax_paid, tax_description = :tax_description WHERE tax_id = :tax_id');
    $request->execute(array('tax_date' => $tax_date,
                            'tax_declare' => $tax_declare,
                            'tax_paid' => $tax_paid,
                            'tax_description' => $tax_description,
                            'tax_id' => $tax_id));

    return $request;
  }

/*
  public function getClient($clientId)
  {
      $db = $this->dbConnect();
      $req = $db->prepare('SELECT * , DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM clients INNER JOIN contact_by ON contact_by = id_contact_by WHERE id_client = ?');
      $req->execute(array($clientId));
      $post = $req->fetch();

      return $post;
  }*/

  public function totalsTax()
  {

    $db = $this->dbConnect();
    $sql = 'SELECT SUM(tax_declare) AS sumDeclaredTax,SUM(tax_paid) AS sumPaidTax FROM taxes';
    $result = $db->query($sql);
    $sumTax = $result->fetch();
    return $sumTax;

  }

  public function monthTax()
  {
    $db = $this->dbConnect();
    $sql = 'SELECT Month(tax_date) as month, Count(*) as nb, SUM(tax_declare) as cashDeclared, SUM(tax_paid) as paied FROM taxes GROUP BY Month(tax_date) LIMIT 0,7';
    $req = $db->query($sql);

    return $req;
  }

  public function monthPaiedTax(){
    $db = $this->dbConnect();
    $sql = 'SELECT monthname(creation_date), sum(val1) cashSeanceMonth, sum(val2) taxesMonth
            from (
            select creation_date, val1, val2
            from (select creation_date, prise val1, 0 val2
            from seances) s1
            union
            (select tax_date m, 0 val1, tax_paid val2
            from taxes ) ) t
            group by month(creation_date)
            order by creation_date
            LIMIT 0,7';
    $req = $db->query($sql);

    return $req;
  }

  public function newTaxes($tax_date, $tax_declare, $tax_paid, $tax_description)
  {

        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO taxes(tax_date, tax_declare, tax_paid, tax_description, taxe_date_add) VALUES(?, ?, ?, ?, NOW())');
        $addedTaxe = $req->execute(array($tax_date, $tax_declare, $tax_paid, $tax_description));
        $last_id = $db->lastInsertId();
        $_SESSION['last_id'] = $last_id;

        return $addedTaxe;

  }




}
