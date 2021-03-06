<?php
/**
 * ProductPurchaseValidator.class.php
 *
 * This file contains the definition of the ProductPurchaseValidator class.
 *
 * @package SolidWorks
 * @author John Diamond <jdiamond@solid-state.org>
 * @copyright John Diamond <jdiamond@solid-state.org>
 * @license http://www.opensource.org/licenses/gpl-license.php GNU Public License
 */

/**
 * ProductPurchaseValidator
 *
 * @package SolidWorks
 * @author John Diamond <jdiamond@solid-state.org>
 */
class ProductPurchaseValidator extends FieldValidator {
	/**
	 * @var integer Account ID
	 */
	protected $accountID = null;

	/**
	 * Set Account ID
	 *
	 * @param integer $id Account ID
	 */
	public function setAccountID( $id ) {
		$this->accountID = $id;
	}

	/**
	 * Validate a Product  Purchase ID
	 *
	 * Verifies that the server exists.
	 *
	 * @param string $data Field data
	 * @return ProductPurchaseDBO Purchase DBO for this ProductPurchase ID
	 * @throws RecordNotFoundException
	 */
	public function validate( $data ) {
		$data = parent::validate( $data );

		try {
			$purchaseDBO = load_ProductPurchaseDBO( intval( $data ) );
		}
		catch ( DBNoRowsFoundException $e ) {
			throw new RecordNotFoundException( "ProductPurchase" );
		}

		// Verify that this purchase is for a specific account
		if ( isset( $this->accountID ) && $purchaseDBO->getAccountID() != $this->accountID ) {
			throw new FieldException( "Purchase/Account mismatch" );
		}

		return $purchaseDBO;
	}
}
?>