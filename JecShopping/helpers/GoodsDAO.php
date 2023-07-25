<?php
require_once 'DAO.php';

class Goods
{
    public String $goodscode;
    public String $goodsname;
    public int $price;
    public String $detail;
    public int $groupcode;
    public bool $recommend;
    public String $goodsimage;
}
class GoodsDAO
{
    //LS3
    public function get_goods_by_goodscode(string $goodscode)
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT *
            FROM goods
            WHERE goodscode = :goodscode"; 

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':goodscode', $goodscode, PDO::PARAM_STR);

        $stmt->execute();

        
        $goods = $stmt->fetchObject('Goods');
        return $goods;
        }

    //LS2
    public function get_goods_by_groupcode(int $groupcode)
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT *
            FROM goods
            WHERE groupcode = :groupcode
            ORDER BY recommend DESC";

            $stmt = $dbh->prepare($sql);

            $stmt->bindValue(':groupcode', $groupcode, PDO::PARAM_INT);

            $stmt->execute();

            $data = [];
            while($row = $stmt->fetchObject('Goods')){
                $data[] = $row;
            }
            return $data;
    }
            
    //LS1
    public function get_recommend_goods()
    {
        $dbh = DAO::get_db_connect();

        $sql = "SELECT *
                FROM Goods
                WHERE recommend = 1";

        $stmt = $dbh->prepare($sql);

        $stmt->execute();

        $data = [];
        while($row = $stmt->fetchObject('Goods')){
            $data[] = $row;
        }
        return $data;
    }
}