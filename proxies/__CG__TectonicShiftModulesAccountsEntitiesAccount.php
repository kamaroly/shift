<?php

namespace DoctrineProxies\__CG__\Tectonic\Shift\Modules\Accounts\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Account extends \Tectonic\Shift\Modules\Accounts\Entities\Account implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', 'id', 'owner', 'name', 'domains', 'users', 'locales', '' . "\0" . 'Tectonic\\Shift\\Modules\\Accounts\\Entities\\Account' . "\0" . 'createdAt', '' . "\0" . 'Tectonic\\Shift\\Modules\\Accounts\\Entities\\Account' . "\0" . 'updatedAt', '' . "\0" . 'Tectonic\\Shift\\Modules\\Accounts\\Entities\\Account' . "\0" . 'deletedAt');
        }

        return array('__isInitialized__', 'id', 'owner', 'name', 'domains', 'users', 'locales', '' . "\0" . 'Tectonic\\Shift\\Modules\\Accounts\\Entities\\Account' . "\0" . 'createdAt', '' . "\0" . 'Tectonic\\Shift\\Modules\\Accounts\\Entities\\Account' . "\0" . 'updatedAt', '' . "\0" . 'Tectonic\\Shift\\Modules\\Accounts\\Entities\\Account' . "\0" . 'deletedAt');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Account $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function addDomain(\Tectonic\Shift\Modules\Accounts\Entities\Domain $domain)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addDomain', array($domain));

        return parent::addDomain($domain);
    }

    /**
     * {@inheritDoc}
     */
    public function addUser(\Tectonic\Shift\Modules\Users\Entities\User $user)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addUser', array($user));

        return parent::addUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getDomains()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDomains', array());

        return parent::getDomains();
    }

    /**
     * {@inheritDoc}
     */
    public function getOwner()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOwner', array());

        return parent::getOwner();
    }

    /**
     * {@inheritDoc}
     */
    public function getUsers()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsers', array());

        return parent::getUsers();
    }

    /**
     * {@inheritDoc}
     */
    public function setOwner(\Tectonic\Shift\Modules\Users\Entities\User $user)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOwner', array($user));

        return parent::setOwner($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getLocales()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLocales', array());

        return parent::getLocales();
    }

    /**
     * {@inheritDoc}
     */
    public function addLocale(\Tectonic\Shift\Modules\Localisation\Entities\Locale $locale)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addLocale', array($locale));

        return parent::addLocale($locale);
    }

    /**
     * {@inheritDoc}
     */
    public function __call($method, array $arguments = array (
))
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__call', array($method, $arguments));

        return parent::__call($method, $arguments);
    }

    /**
     * {@inheritDoc}
     */
    public function toJson($options = 0)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toJson', array($options));

        return parent::toJson($options);
    }

    /**
     * {@inheritDoc}
     */
    public function prePersist()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'prePersist', array());

        return parent::prePersist();
    }

    /**
     * {@inheritDoc}
     */
    public function preUpdate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'preUpdate', array());

        return parent::preUpdate();
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', array());

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt(\DateTime $createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', array($createdAt));

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', array());

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', array($updatedAt));

        return parent::setUpdatedAt($updatedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getDeletedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDeletedAt', array());

        return parent::getDeletedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setDeletedAt(\DateTime $deletedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDeletedAt', array($deletedAt));

        return parent::setDeletedAt($deletedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function isDeleted()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isDeleted', array());

        return parent::isDeleted();
    }

}
