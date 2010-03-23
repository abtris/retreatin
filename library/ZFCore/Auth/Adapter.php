<?php
/**
 * @version ##VERSION##
 * @package ##PACKAGE##
 */
/**
 * Doctrine Auth Adapter
 * @package ##PACKAGE##
 */
class ZFCore_Auth_Adapter
    implements Zend_Auth_Adapter_Interface
{
    const NOT_FOUND_MESSAGE = "Account not found";
    const BAD_PW_MESSAGE = "Password is invalid";
    const BAN_MESSAGE = "Your account is banned!";
    const VERIFY_MESSAGE = "Your account is not verified!";

    /**
     *
     * @var Model_User
     */
    protected $user;

    /**
     *
     * @var string
     */
    protected $email;

    /**
     *
     * @var string
     */
    protected $password;
    /**
     * Constructor
     * @param string $email
     * @param string $password
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }
    /**
     * Performs an authentication attempt
     *
     * @throws Zend_Auth_Adapter_Exception If authentication cannot be performed
     * @return Zend_Auth_Result
     */
    public function authenticate()
    {
        try
        {
            $this->user = Users::authenticate($this->email, $this->password);
        }
        catch (Exception $e)
        {
            if ($e->getMessage() == Users::WRONG_PW)
                return $this->result(Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID, self::BAD_PW_MESSAGE);
            if ($e->getMessage() == Users::NOT_FOUND)
                return $this->result(Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND, self::NOT_FOUND_MESSAGE);
            if ($e->getMessage() == Users::BAN)
                return $this->result(Zend_Auth_Result::FAILURE_UNCATEGORIZED, self::BAN_MESSAGE);
            if ($e->getMessage() == Users::NOT_VERIFY)
                return $this->result(Zend_Auth_Result::FAILURE_UNCATEGORIZED, self::VERIFY_MESSAGE);

        }
        return $this->result(Zend_Auth_Result::SUCCESS);
    }

    /**
     * Factory for Zend_Auth_Result
     *
     *@param integer    The Result code, see Zend_Auth_Result
     *@param mixed      The Message, can be a string or array
     *@return Zend_Auth_Result
     */
    public function result($code, $messages = array()) {
        if (!is_array($messages)) {
            $messages = array($messages);
        }

        return new Zend_Auth_Result(
            $code,
            $this->user,
            $messages
        );
    }
}

