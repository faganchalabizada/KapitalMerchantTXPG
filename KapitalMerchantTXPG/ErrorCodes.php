<?php

namespace FaganChalabizada\KapitalMerchantTXPG;

class ErrorCodes
{

    // Define the error codes and descriptions as a static array
    private static array $errors = [
        'InvalidAmt' => 'Valid amount',
        'InvalidRequest' => 'причина отклонения',
        'InvalidTran' => 'Invalid transaction',
        'InvalidTranLink' => 'Invalid transaction linkage',
        'TranProhibited' => 'Transaction prohibited',
        'ActionAppException' => 'причина отклонения',
        'CantChooseSettleAcct' => 'Can\'t choose settlement account',
        'PmoIfaceNotFound' => 'PMO interface not found',
        'PmoDecline' => 'Transaction declined by PMO: причина отклонения',
        'PmoUnreachable' => 'Can\'t reach PMO',
        'InvalidCert' => 'Invalid certificate',
        'InvalidLogin' => 'Invalid login or password',
        'InvalidOrderState' => 'причина некорректного состояния ордера',
        'InvalidUserSession' => 'Invalid user session',
        'NeedChangePwd' => 'Need change password',
        'OperationProhibited' => 'Operation prohibited',
        'PwdTryLimitExceeded' => 'Password try limit has been exceeded',
        'UserSessionExpired' => 'User session expired',
        'CofpDecline' => 'Declined by CoF Provider: причина отклонения',
        'CofpUnreachable' => 'Can\'t reach CoF Provider',
        'InvalidToken' => 'причина некорректного состояния токена',
        'InvalidAutStatus' => 'Invalid authentication status',
        'ConsumerNotFound' => 'Consumer not found',
        'InvalidConsumer' => 'Invalid consumer',
        'InvalidSecret' => 'Invalid secret code',
        'SecretTryLimit' => 'Secret try limit has been exceeded',
    ];


    /**
     * Get error details by error code.
     *
     * @param string $code
     * @return Error
     */
    public static function getInfoByErrorCode(string $code): Error
    {
        $err = self::$errors[$code];

        if ($err != null) {
            return new Error($code, $err, $err);
        }

        return new Error(-1, "Not found", "Undefined error");
    }

}
