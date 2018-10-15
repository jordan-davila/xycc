<?php

/**
 *
 */
class Pagination
{

  public function __construct( $query, $total, $page, $limit, $links ) {
      $this->_query = $query;
      $this->_total = $total;
      $this->_page  = $page;
      $this->_limit = $limit;
      $this->_links = $links;
  }

  public function getData() {

      if ( $this->_limit == 'all' ) {
          $query = $this->_query;
      } else {
          $query = $this->_query . " LIMIT " . ( ( $this->_page - 1 ) * $this->_limit ) . ", $this->_limit";
      }
      return $query;
  }

  public function createLinks() {
      $html       = '';
      $last       = ceil( $this->_total / $this->_limit );
      $start      = ( ( $this->_page - $this->_links ) > 0 ) ? $this->_page - $this->_links : 1;
      $end        = ( ( $this->_page + $this->_links ) < $last ) ? $this->_page + $this->_links : $last;
      $disabled   = ( $this->_page == 1 ) ? true : false;

      if (!$disabled) {
        $html =  '<a href="?limit=' . $this->_limit . '&page=' . ( $this->_page - 1 ) . '">&laquo;</a>';
      }

      if ( $start > 1 ) {
          $html   .= '<a href="?limit=' . $this->_limit . '&page=1">1</a>';
      }

      for ( $i = $start ; $i <= $end; $i++ ) {
          $class  = ( $this->_page == $i ) ? "active" : "";
          $html   .= '<a class="' . $class . '" href="?limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a>';
      }

      if ( $end < $last ) {
          $html   .= '<a href="?limit=' . $this->_limit . '&page=' . $last . '">' . $last . '</a>';
      }

      $disabled    = ( $this->_page == $last ) ? true : false;

      if (!$disabled) {
        $html  .= '<a href="?limit=' . $this->_limit . '&page=' . ( $this->_page + 1 ) . '">&raquo;</a>';
      }

      return $html;
  }

}


 ?>
