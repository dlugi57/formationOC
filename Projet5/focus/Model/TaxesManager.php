<?php
namespace Model;

//require_once("Model/Manager.php");

class TaxesManager extends Manager
{
  public function getTaxes()
  {
    $db = $this->dbConnect();
    $req = $db->query('SELECT * ,Month(tax_date) as month FROM taxes ORDER BY tax_date ASC');

    return $req;
  }

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




}
