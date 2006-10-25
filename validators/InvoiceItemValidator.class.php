<?php
/**
 * InvoiceItemValidator.class.php
 *
 * This file contains the definition of the InvoiceItemValidator class.  
 *
 * @package SolidWorks
 * @author John Diamond <jdiamond@solid-state.org>
 * @copyright John Diamond <jdiamond@solid-state.org>
 * @license http://www.opensource.org/licenses/gpl-license.php GNU Public License
 */

// Base class
require_once BASE_PATH . "solidworks/validators/FieldValidator.class.php";

// Exceptions
require_once BASE_PATH . "exceptions/RecordNotFoundException.class.php";

// InvoiceItem DBO
require_once BASE_PATH . "DBO/InvoiceItemDBO.class.php";

/**
 * InvoiceItemValidator
 *
 * @package SolidWorks
 * @author John Diamond <jdiamond@solid-state.org>
 */
class InvoiceItemValidator extends FieldValidator
{
  /**
   * Validate an InvoiceItem ID
   *
   * Verifies that the invoice exists.
   *
   * @param string $data Field data
   * @return InvoiceItemDBO InvoiceItem DBO for this InvoiceItem ID
   * @throws RecordNotFoundException
   */
  public function validate( $data )
  {
    $data = parent::validate( $data );

    if( null == ($itemDBO = load_InvoiceItemDBO( intval( $data ) )) )
      {
	throw new RecordNotFoundException( "InvoiceItem" );
      }

    return $itemDBO;
  }
}
?>