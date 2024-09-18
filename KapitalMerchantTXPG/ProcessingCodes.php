<?php

namespace FaganChalabizada\KapitalMerchantTXPG;

class ProcessingCodes
{

    // Define constants for each error code
    public const NONE = 0;
    public const APPROVED = 1;
    public const APPROVED_PARTIAL = 2;
    public const APPROVED_PURCHASE_ONLY = 3;
    public const POSTPONED = 4;
    public const STRONG_AUTHENTICATION_REQUIRED = 6;
    public const NEED_CHECKERS_CONFIRMATION = 7;
    public const TELEBANK_CUSTOMER_EXISTS = 8;
    public const SELECT_VIRTUAL_CARD = 9;
    public const SELECT_ACCOUNT_NUMBER = 10;
    public const CHANGE_PVV = 11;
    public const CONFIRM_PAYMENT_PRECHECK = 12;
    public const SELECT_BILL = 13;
    public const CUSTOMER_CONFIRMATION_REQUESTED = 14;
    public const ORIGINAL_TRANSACTION_NOT_FOUND = 15;
    public const SLIP_ALREADY_RECEIVED = 16;
    public const PERSONAL_INFO_INPUT_ERROR = 17;
    public const SMS_EMAIL_DYNAMIC_PASSWORD_REQUESTED = 18;
    public const DPA_CAP_DYNAMIC_PASSWORD_REQUESTED = 19;
    public const PREPAID_CODE_NOT_FOUND = 20;
    public const ACCOUNT_EXHAUSTED = 21;
    public const ACQUIRER_LIMIT_EXCEEDED = 22;
    public const CUTOVER_IN_PROCESS = 23;
    public const DYNAMIC_PVV_EXPIRED = 24;
    public const WEAK_PIN = 25;
    public const EXTERNAL_AUTHENTICATION_REQUIRED = 26;
    public const ADDITIONAL_DATA_REQUIRED = 27;
    public const CLOSED_ACCOUNT = 29;
    public const BLOCKED = 30;
    public const LOST_CARD = 40;
    public const STOLEN_CARD = 41;
    public const INELIGIBLE_VENDOR_ACCOUNT = 49;
    public const UNAUTHORIZED_USAGE = 50;
    public const EXPIRED_CARD = 51;
    public const INVALID_CARD = 52;
    public const INVALID_PIN = 53;
    public const SYSTEM_ERROR = 54;
    public const INELIGIBLE_TRANSACTION = 55;
    public const INELIGIBLE_ACCOUNT = 56;
    public const TRANSACTION_NOT_SUPPORTED = 57;
    public const RESTRICTED_CARD = 58;
    public const INSUFFICIENT_FUNDS = 59;
    public const USAGE_LIMIT_EXCEEDED = 60;
    public const WITHDRAWAL_LIMIT_EXCEEDED = 61;
    public const PIN_TRIES_LIMIT_REACHED = 62;
    public const WITHDRAWAL_LIMIT_ALREADY_REACHED = 63;
    public const CREDIT_AMOUNT_LIMIT_REACHED = 64;
    public const NO_STATEMENT_INFO = 65;
    public const STATEMENT_NOT_AVAILABLE = 66;
    public const INVALID_AMOUNT = 67;
    public const EXTERNAL_DECLINE = 68;
    public const NO_SHARING = 69;
    public const CONTACT_CARD_ISSUER = 71;
    public const DESTINATION_NOT_AVAILABLE = 72;
    public const ROUTING_ERROR = 73;
    public const FORMAT_ERROR = 74;
    public const EXTERNAL_DECLINE_SPECIAL_CONDITION = 75;
    public const BAD_CVV = 80;
    public const BAD_CVV2 = 81;
    public const INVALID_TRANSACTION = 82;
    public const PIN_TRIES_LIMIT_EXCEEDED = 83;
    public const BAD_CAVV = 84;
    public const BAD_ARQC = 85;
    public const APPROVE_ADMIN_OPERATION_INSIDE_WINDOW = 90;
    public const APPROVE_ADMIN_OPERATION_OUTSIDE_WINDOW = 91;
    public const APPROVE_ADMIN_OPERATION = 92;
    public const SELECT_CARD = 93;
    public const CONFIRM_ISSUER_FEE = 94;
    public const INSUFFICIENT_CASH = 95;
    public const APPROVED_FRICTIONLESS = 96;
    public const INVALID_MERCHANT = 98;

    // Error code array with title and description
    public const ERROR_CODES = [
        self::NONE => ['title' => 'None', 'description' => '-'],
        self::APPROVED => ['title' => 'Approved', 'description' => 'OK'],
        self::APPROVED_PARTIAL => ['title' => 'Approved Partial', 'description' => 'Transaction is approved for the partial amount'],
        self::APPROVED_PURCHASE_ONLY => ['title' => 'Approved Purchase Only', 'description' => 'Transaction is approved for the Purchase amount; the Cashback amount is not approved'],
        self::POSTPONED => ['title' => 'Postponed', 'description' => 'Transaction is postponed, it will be processed later'],
        self::STRONG_AUTHENTICATION_REQUIRED => ['title' => 'Strong customer authentication required', 'description' => 'Strong customer authentication is required for the transaction execution.'],
        self::NEED_CHECKERS_CONFIRMATION => ['title' => 'Need Checker\'s confirmation', 'description' => 'The checker confirmation is required'],
        self::TELEBANK_CUSTOMER_EXISTS => ['title' => 'Telebank customer already exists', 'description' => 'Telebank customer already exists'],
        self::SELECT_VIRTUAL_CARD => ['title' => 'Should select virtual card product', 'description' => 'Virtual card product should be selected'],
        self::SELECT_ACCOUNT_NUMBER => ['title' => 'Should select account number', 'description' => 'Account number should be selected'],
        self::CHANGE_PVV => ['title' => 'Should change PVV', 'description' => 'PIN should be changed'],
        self::CONFIRM_PAYMENT_PRECHECK => ['title' => 'Confirm payment precheck', 'description' => 'The results of payment verification in the payment online acceptance system should be confirmed'],
        self::SELECT_BILL => ['title' => 'Select bill', 'description' => 'Select the bill to be paid'],
        self::CUSTOMER_CONFIRMATION_REQUESTED => ['title' => 'Customer confirmation requested', 'description' => 'Customer confirmation is requested'],
        self::ORIGINAL_TRANSACTION_NOT_FOUND => ['title' => 'Original transaction not found', 'description' => 'Original transaction is not found (for example, while receiving an electronic slip from POS terminal; or an original transaction for the reversal)'],
        self::SLIP_ALREADY_RECEIVED => ['title' => 'Slip already received', 'description' => 'Slip has already been received'],
        self::PERSONAL_INFO_INPUT_ERROR => ['title' => 'Personal information input error', 'description' => 'Error by entering payment attributes'],
        self::SMS_EMAIL_DYNAMIC_PASSWORD_REQUESTED => ['title' => 'SMS/Email dynamic password requested', 'description' => 'SMS/Email dynamic password is requested'],
        self::DPA_CAP_DYNAMIC_PASSWORD_REQUESTED => ['title' => 'DPA/CAP dynamic password requested', 'description' => 'DPA/CAP dynamic password is requested'],
        self::PREPAID_CODE_NOT_FOUND => ['title' => 'Prepaid code not found', 'description' => 'Prepaid code is not found'],
        self::ACCOUNT_EXHAUSTED => ['title' => 'Corresponding account exhausted', 'description' => 'Agent bank correspondent account is exhausted'],
        self::ACQUIRER_LIMIT_EXCEEDED => ['title' => 'Acquirer limit exceeded', 'description' => 'Merchant acquiring limit has already been reached or exceeded'],
        self::CUTOVER_IN_PROCESS => ['title' => 'Cutover in process', 'description' => 'Cutover is being performed'],
        self::DYNAMIC_PVV_EXPIRED => ['title' => 'Dynamic PVV Expired', 'description' => 'Dynamic PVV expired'],
        self::WEAK_PIN => ['title' => 'Weak PIN', 'description' => 'Weak PIN'],
        self::EXTERNAL_AUTHENTICATION_REQUIRED => ['title' => 'External authentication required', 'description' => 'External authentication is requested'],
        self::ADDITIONAL_DATA_REQUIRED => ['title' => 'Additional data required', 'description' => 'Additional data is required'],
        self::CLOSED_ACCOUNT => ['title' => 'Closed account', 'description' => 'The account is closed'],
        self::BLOCKED => ['title' => 'Blocked', 'description' => 'Blocked'],
        self::LOST_CARD => ['title' => 'Lost card', 'description' => 'The card is lost'],
        self::STOLEN_CARD => ['title' => 'Stolen card', 'description' => 'The card is stolen'],
        self::INELIGIBLE_VENDOR_ACCOUNT => ['title' => 'Ineligible vendor account', 'description' => 'Ineligible vendor account'],
        self::UNAUTHORIZED_USAGE => ['title' => 'Unauthorized usage', 'description' => 'The card unauthorized usage'],
        self::EXPIRED_CARD => ['title' => 'Expired card', 'description' => 'The card is expired'],
        self::INVALID_CARD => ['title' => 'Invalid card', 'description' => 'The card is invalid'],
        self::INVALID_PIN => ['title' => 'Invalid PIN', 'description' => 'Invalid PIN'],
        self::SYSTEM_ERROR => ['title' => 'System error', 'description' => 'System error'],
        self::INELIGIBLE_TRANSACTION => ['title' => 'Ineligible transaction', 'description' => 'Ineligible transaction'],
        self::INELIGIBLE_ACCOUNT => ['title' => 'Ineligible account', 'description' => 'Ineligible account'],
        self::TRANSACTION_NOT_SUPPORTED => ['title' => 'Transaction not supported', 'description' => 'Transaction is not supported by the card or terminal'],
        self::RESTRICTED_CARD => ['title' => 'Restricted card', 'description' => 'The card is restricted by issuer'],
        self::INSUFFICIENT_FUNDS => ['title' => 'Insufficient funds', 'description' => 'Insufficient funds'],
        self::USAGE_LIMIT_EXCEEDED => ['title' => 'Usage limit exceeded', 'description' => 'Transaction amount exceeds limits'],
        self::WITHDRAWAL_LIMIT_EXCEEDED => ['title' => 'Withdrawal limit exceeded', 'description' => 'Withdrawal limit exceeded'],
        self::PIN_TRIES_LIMIT_REACHED => ['title' => 'PIN tries limit reached', 'description' => 'PIN tries limit exceeded'],
        self::WITHDRAWAL_LIMIT_ALREADY_REACHED => ['title' => 'Withdrawal limit already reached', 'description' => 'Withdrawal limit has already been reached'],
        self::CREDIT_AMOUNT_LIMIT_REACHED => ['title' => 'Credit amount limit reached', 'description' => 'Credit amount limit has already been reached'],
        self::NO_STATEMENT_INFO => ['title' => 'No statement information', 'description' => 'No statement information is available'],
        self::STATEMENT_NOT_AVAILABLE => ['title' => 'Statement not available', 'description' => 'Statement is not available'],
        self::INVALID_AMOUNT => ['title' => 'Invalid amount', 'description' => 'Transaction amount exceeds permissible amount'],
        self::EXTERNAL_DECLINE => ['title' => 'External decline', 'description' => 'External decline by issuer'],
        self::NO_SHARING => ['title' => 'No sharing', 'description' => 'Transaction sharing is not allowed'],
        self::CONTACT_CARD_ISSUER => ['title' => 'Contact card issuer', 'description' => 'Contact card issuer'],
        self::DESTINATION_NOT_AVAILABLE => ['title' => 'Destination not available', 'description' => 'Destination not available'],
        self::ROUTING_ERROR => ['title' => 'Routing error', 'description' => 'Routing error'],
        self::FORMAT_ERROR => ['title' => 'Format error', 'description' => 'Format error in the transaction request'],
        self::EXTERNAL_DECLINE_SPECIAL_CONDITION => ['title' => 'External decline special condition', 'description' => 'Declined due to external special condition'],
        self::BAD_CVV => ['title' => 'Bad CVV', 'description' => 'Bad CVV'],
        self::BAD_CVV2 => ['title' => 'Bad CVV2', 'description' => 'Bad CVV2'],
        self::INVALID_TRANSACTION => ['title' => 'Invalid transaction', 'description' => 'Invalid transaction'],
        self::PIN_TRIES_LIMIT_EXCEEDED => ['title' => 'PIN tries limit exceeded', 'description' => 'PIN tries limit exceeded'],
        self::BAD_CAVV => ['title' => 'Bad CAVV', 'description' => 'Bad CAVV'],
        self::BAD_ARQC => ['title' => 'Bad ARQC', 'description' => 'Bad ARQC'],
        self::APPROVE_ADMIN_OPERATION_INSIDE_WINDOW => ['title' => 'Approve admin operation inside window', 'description' => 'Approve admin operation inside window'],
        self::APPROVE_ADMIN_OPERATION_OUTSIDE_WINDOW => ['title' => 'Approve admin operation outside window', 'description' => 'Approve admin operation outside window'],
        self::APPROVE_ADMIN_OPERATION => ['title' => 'Approve admin operation', 'description' => 'Admin operation approved'],
        self::SELECT_CARD => ['title' => 'Select card', 'description' => 'Select card for payment'],
        self::CONFIRM_ISSUER_FEE => ['title' => 'Confirm issuer fee', 'description' => 'Issuer fee confirmation is required'],
        self::INSUFFICIENT_CASH => ['title' => 'Insufficient cash', 'description' => 'Insufficient cash available for the operation'],
        self::APPROVED_FRICTIONLESS => ['title' => 'Approved frictionless', 'description' => 'Transaction is approved under frictionless processing'],
        self::INVALID_MERCHANT => ['title' => 'Invalid merchant', 'description' => 'Invalid merchant']
    ];

    /**
     * Get error details by error code.
     *
     * @param int $code
     * @return Error
     */
    public static function getInfoByCode(int $code): Error
    {
        $err = self::ERROR_CODES[$code];

        if ($err != null) {
            return new Error($code, $err['title'], $err['description']);
        }

        return new Error(-1, "Not found", "Undefined error");
    }
}
