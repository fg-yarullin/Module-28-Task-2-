<?php
interface IProduct {
  public function add(array $product);
  public function getProductsList();
  public function getProduct($id);
  public function isInStock($id);
  public function remove($id);
  public function getProductsData(array $ids);

}

Class Product extends Model implements IProduct {
    private $_list = array();
 
  public function __construct(array $products )
  {
    if (!empty($products))
    {
      foreach($products as $product)
      {
        $this->_list[] = $product;
      }
    }
  }
 
  public function add($product)
  {
    $this->_list[] = $product;
  }

  public function getProductsList()
  {
    return $this->_list;
  }

  public function getProduct($id)
  {
    return $this->_list[$id];
  }
 
  public function isInStock($id)
  {
    if ($this->_list[$id][1] > 0) {
      return true;
    }
    return false;
  }

  public function remove($id)
  {
    if ($this->_list[$id][1] > 0) {
      $this->_list[$id][1]--;
    } else {
      // throw(new Exception('Данный товар закончился.'));
      echo '<br>Данного товара нет в наличии.';
    }
  }

  // to load Prodcts from any resource
  public static function Load(array $products) 
  {
    return new Product($products);
  }

  /** 
   * to create new Product (add new Product to resource), etc. DB or file
   * parametr $product without $id filed or $id = null
  */ 

  public static function Create(array $product) 
  {
    return new Product($product);
  }

  public function getProductsData(array $ids)
  {
    $selectedProducts = [];
    foreach ($ids as $id) {
      $selectedProducts[] = $this->_list[$id];
    }
    return $selectedProducts;     
  }
}
