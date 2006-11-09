<?php
/**
 * OrderTableWidget.class.php
 *
 * This file contains the definition of the OrderTableWidget class.  
 *
 * @package SolidWorks
 * @author John Diamond <jdiamond@solid-state.org>
 * @copyright John Diamond <jdiamond@solid-state.org>
 * @license http://www.opensource.org/licenses/gpl-license.php GNU Public License
 */

// Base class
require_once BASE_PATH . "solidworks/widgets/TableWidget.class.php";

// OrderDBO
require_once BASE_PATH . "DBO/OrderDBO.class.php";

/**
 * OrderTableWidget
 *
 * @package SolidWorks
 * @author John Diamond <jdiamond@solid-state.org>
 */
class OrderTableWidget extends TableWidget
{
  /**
   * @var string Order status filter
   */
  private $statusFilter = null;

  /**
   * Initialize the Table
   *
   * @param array $params Parameters from the {form_table} tag
   */
  public function init( $params ) 
  { 
    parent::init( $params );

    // Build an order filter
    $where = isset( $this->statusFilter ) ? 
      sprintf( "status='%s'", $this->statusFilter ) : null;

    // Load the Order Table
    if( null != ($orders = load_array_OrderDBO( $where )) )
      {
	// Build the table
	foreach( $orders as $dbo )
	  {
	    // Put the row into the table
	    $this->data[] = 
	      array( "id" => $dbo->getID(),
		     "datecreated" => $dbo->getDateCreated(),
		     "datecompleted" => $dbo->getDateCompleted(),
		     "datefulfilled" => $dbo->getDateFulfilled(),
		     "remoteip" => $dbo->getRemoteIP(),
                     "remoteipstring" => $dbo->getRemoteIPString(),
		     "businessname" => $dbo->getBusinessName(),
		     "contactname" => $dbo->getContactName(),
		     "contactemail" => $dbo->getContactEmail(),
		     "status" => $dbo->getStatus(),
		     "accountid" => $dbo->getAccountID(),
		     "accounttype" => $dbo->getAccountType(),
                     "accountname" => $dbo->getAccountName(),
                     "total" => $dbo->getTotal() );
	  }
      }
  }

  /**
   * Set Order Status Filter
   *
   * @param string $status Order status
   */
  public function setStatus( $status )
  {
    $this->statusFilter = $status;
  }
}