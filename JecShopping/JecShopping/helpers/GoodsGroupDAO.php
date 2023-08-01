<?php
require_once 'DAO.php';

class GoodsGroup
{
    public int $groupcode;  //商品コード
    public string $groupname; //商品名
}
class GoodsGroupDAO
{
    public function get_goodsgroup()
    {
        $dbh=DAO::get_db_connect();

        $sql = "SELECT * FROM GoodsGroup";
        $stmt = $dbh->prepare($sql);

        $stmt->execute();

        $data = [];
        while($row = $stmt->fetchObject('GoodsGroup')){
            $data[] = $row;
        }
        return $data;
    }
}

