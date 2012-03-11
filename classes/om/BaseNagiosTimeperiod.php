<?php


/**
 * Base class that represents a row from the 'nagios_timeperiod' table.
 *
 * Nagios Timeperiods
 *
 * @package    propel.generator..om
 */
abstract class BaseNagiosTimeperiod extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'NagiosTimeperiodPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        NagiosTimeperiodPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the alias field.
	 * @var        string
	 */
	protected $alias;

	/**
	 * @var        array NagiosTimeperiodEntry[] Collection to store aggregation of NagiosTimeperiodEntry objects.
	 */
	protected $collNagiosTimeperiodEntrys;

	/**
	 * @var        array NagiosTimeperiodExclude[] Collection to store aggregation of NagiosTimeperiodExclude objects.
	 */
	protected $collNagiosTimeperiodExcludesRelatedByTimeperiodId;

	/**
	 * @var        array NagiosTimeperiodExclude[] Collection to store aggregation of NagiosTimeperiodExclude objects.
	 */
	protected $collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod;

	/**
	 * @var        array NagiosContact[] Collection to store aggregation of NagiosContact objects.
	 */
	protected $collNagiosContactsRelatedByHostNotificationPeriod;

	/**
	 * @var        array NagiosContact[] Collection to store aggregation of NagiosContact objects.
	 */
	protected $collNagiosContactsRelatedByServiceNotificationPeriod;

	/**
	 * @var        array NagiosHostTemplate[] Collection to store aggregation of NagiosHostTemplate objects.
	 */
	protected $collNagiosHostTemplatesRelatedByCheckPeriod;

	/**
	 * @var        array NagiosHostTemplate[] Collection to store aggregation of NagiosHostTemplate objects.
	 */
	protected $collNagiosHostTemplatesRelatedByNotificationPeriod;

	/**
	 * @var        array NagiosHost[] Collection to store aggregation of NagiosHost objects.
	 */
	protected $collNagiosHostsRelatedByCheckPeriod;

	/**
	 * @var        array NagiosHost[] Collection to store aggregation of NagiosHost objects.
	 */
	protected $collNagiosHostsRelatedByNotificationPeriod;

	/**
	 * @var        array NagiosServiceTemplate[] Collection to store aggregation of NagiosServiceTemplate objects.
	 */
	protected $collNagiosServiceTemplatesRelatedByCheckPeriod;

	/**
	 * @var        array NagiosServiceTemplate[] Collection to store aggregation of NagiosServiceTemplate objects.
	 */
	protected $collNagiosServiceTemplatesRelatedByNotificationPeriod;

	/**
	 * @var        array NagiosService[] Collection to store aggregation of NagiosService objects.
	 */
	protected $collNagiosServicesRelatedByCheckPeriod;

	/**
	 * @var        array NagiosService[] Collection to store aggregation of NagiosService objects.
	 */
	protected $collNagiosServicesRelatedByNotificationPeriod;

	/**
	 * @var        array NagiosDependency[] Collection to store aggregation of NagiosDependency objects.
	 */
	protected $collNagiosDependencys;

	/**
	 * @var        array NagiosEscalation[] Collection to store aggregation of NagiosEscalation objects.
	 */
	protected $collNagiosEscalations;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $nagiosTimeperiodEntrysScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $nagiosTimeperiodExcludesRelatedByTimeperiodIdScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $nagiosTimeperiodExcludesRelatedByExcludedTimeperiodScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $nagiosContactsRelatedByHostNotificationPeriodScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $nagiosContactsRelatedByServiceNotificationPeriodScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $nagiosHostTemplatesRelatedByCheckPeriodScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $nagiosHostTemplatesRelatedByNotificationPeriodScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $nagiosHostsRelatedByCheckPeriodScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $nagiosHostsRelatedByNotificationPeriodScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $nagiosServiceTemplatesRelatedByCheckPeriodScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $nagiosServiceTemplatesRelatedByNotificationPeriodScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $nagiosServicesRelatedByCheckPeriodScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $nagiosServicesRelatedByNotificationPeriodScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $nagiosDependencysScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $nagiosEscalationsScheduledForDeletion = null;

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * 
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [alias] column value.
	 * 
	 * @return     string
	 */
	public function getAlias()
	{
		return $this->alias;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     NagiosTimeperiod The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NagiosTimeperiodPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     NagiosTimeperiod The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = NagiosTimeperiodPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [alias] column.
	 * 
	 * @param      string $v new value
	 * @return     NagiosTimeperiod The current object (for fluent API support)
	 */
	public function setAlias($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->alias !== $v) {
			$this->alias = $v;
			$this->modifiedColumns[] = NagiosTimeperiodPeer::ALIAS;
		}

		return $this;
	} // setAlias()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->alias = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 3; // 3 = NagiosTimeperiodPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating NagiosTimeperiod object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NagiosTimeperiodPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = NagiosTimeperiodPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collNagiosTimeperiodEntrys = null;

			$this->collNagiosTimeperiodExcludesRelatedByTimeperiodId = null;

			$this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod = null;

			$this->collNagiosContactsRelatedByHostNotificationPeriod = null;

			$this->collNagiosContactsRelatedByServiceNotificationPeriod = null;

			$this->collNagiosHostTemplatesRelatedByCheckPeriod = null;

			$this->collNagiosHostTemplatesRelatedByNotificationPeriod = null;

			$this->collNagiosHostsRelatedByCheckPeriod = null;

			$this->collNagiosHostsRelatedByNotificationPeriod = null;

			$this->collNagiosServiceTemplatesRelatedByCheckPeriod = null;

			$this->collNagiosServiceTemplatesRelatedByNotificationPeriod = null;

			$this->collNagiosServicesRelatedByCheckPeriod = null;

			$this->collNagiosServicesRelatedByNotificationPeriod = null;

			$this->collNagiosDependencys = null;

			$this->collNagiosEscalations = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NagiosTimeperiodPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = NagiosTimeperiodQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NagiosTimeperiodPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				NagiosTimeperiodPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() || $this->isModified()) {
				// persist changes
				if ($this->isNew()) {
					$this->doInsert($con);
				} else {
					$this->doUpdate($con);
				}
				$affectedRows += 1;
				$this->resetModified();
			}

			if ($this->nagiosTimeperiodEntrysScheduledForDeletion !== null) {
				if (!$this->nagiosTimeperiodEntrysScheduledForDeletion->isEmpty()) {
					NagiosTimeperiodEntryQuery::create()
						->filterByPrimaryKeys($this->nagiosTimeperiodEntrysScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->nagiosTimeperiodEntrysScheduledForDeletion = null;
				}
			}

			if ($this->collNagiosTimeperiodEntrys !== null) {
				foreach ($this->collNagiosTimeperiodEntrys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->nagiosTimeperiodExcludesRelatedByTimeperiodIdScheduledForDeletion !== null) {
				if (!$this->nagiosTimeperiodExcludesRelatedByTimeperiodIdScheduledForDeletion->isEmpty()) {
					NagiosTimeperiodExcludeQuery::create()
						->filterByPrimaryKeys($this->nagiosTimeperiodExcludesRelatedByTimeperiodIdScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->nagiosTimeperiodExcludesRelatedByTimeperiodIdScheduledForDeletion = null;
				}
			}

			if ($this->collNagiosTimeperiodExcludesRelatedByTimeperiodId !== null) {
				foreach ($this->collNagiosTimeperiodExcludesRelatedByTimeperiodId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->nagiosTimeperiodExcludesRelatedByExcludedTimeperiodScheduledForDeletion !== null) {
				if (!$this->nagiosTimeperiodExcludesRelatedByExcludedTimeperiodScheduledForDeletion->isEmpty()) {
					NagiosTimeperiodExcludeQuery::create()
						->filterByPrimaryKeys($this->nagiosTimeperiodExcludesRelatedByExcludedTimeperiodScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->nagiosTimeperiodExcludesRelatedByExcludedTimeperiodScheduledForDeletion = null;
				}
			}

			if ($this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod !== null) {
				foreach ($this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->nagiosContactsRelatedByHostNotificationPeriodScheduledForDeletion !== null) {
				if (!$this->nagiosContactsRelatedByHostNotificationPeriodScheduledForDeletion->isEmpty()) {
					NagiosContactQuery::create()
						->filterByPrimaryKeys($this->nagiosContactsRelatedByHostNotificationPeriodScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->nagiosContactsRelatedByHostNotificationPeriodScheduledForDeletion = null;
				}
			}

			if ($this->collNagiosContactsRelatedByHostNotificationPeriod !== null) {
				foreach ($this->collNagiosContactsRelatedByHostNotificationPeriod as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->nagiosContactsRelatedByServiceNotificationPeriodScheduledForDeletion !== null) {
				if (!$this->nagiosContactsRelatedByServiceNotificationPeriodScheduledForDeletion->isEmpty()) {
					NagiosContactQuery::create()
						->filterByPrimaryKeys($this->nagiosContactsRelatedByServiceNotificationPeriodScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->nagiosContactsRelatedByServiceNotificationPeriodScheduledForDeletion = null;
				}
			}

			if ($this->collNagiosContactsRelatedByServiceNotificationPeriod !== null) {
				foreach ($this->collNagiosContactsRelatedByServiceNotificationPeriod as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->nagiosHostTemplatesRelatedByCheckPeriodScheduledForDeletion !== null) {
				if (!$this->nagiosHostTemplatesRelatedByCheckPeriodScheduledForDeletion->isEmpty()) {
					NagiosHostTemplateQuery::create()
						->filterByPrimaryKeys($this->nagiosHostTemplatesRelatedByCheckPeriodScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->nagiosHostTemplatesRelatedByCheckPeriodScheduledForDeletion = null;
				}
			}

			if ($this->collNagiosHostTemplatesRelatedByCheckPeriod !== null) {
				foreach ($this->collNagiosHostTemplatesRelatedByCheckPeriod as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->nagiosHostTemplatesRelatedByNotificationPeriodScheduledForDeletion !== null) {
				if (!$this->nagiosHostTemplatesRelatedByNotificationPeriodScheduledForDeletion->isEmpty()) {
					NagiosHostTemplateQuery::create()
						->filterByPrimaryKeys($this->nagiosHostTemplatesRelatedByNotificationPeriodScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->nagiosHostTemplatesRelatedByNotificationPeriodScheduledForDeletion = null;
				}
			}

			if ($this->collNagiosHostTemplatesRelatedByNotificationPeriod !== null) {
				foreach ($this->collNagiosHostTemplatesRelatedByNotificationPeriod as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->nagiosHostsRelatedByCheckPeriodScheduledForDeletion !== null) {
				if (!$this->nagiosHostsRelatedByCheckPeriodScheduledForDeletion->isEmpty()) {
					NagiosHostQuery::create()
						->filterByPrimaryKeys($this->nagiosHostsRelatedByCheckPeriodScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->nagiosHostsRelatedByCheckPeriodScheduledForDeletion = null;
				}
			}

			if ($this->collNagiosHostsRelatedByCheckPeriod !== null) {
				foreach ($this->collNagiosHostsRelatedByCheckPeriod as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->nagiosHostsRelatedByNotificationPeriodScheduledForDeletion !== null) {
				if (!$this->nagiosHostsRelatedByNotificationPeriodScheduledForDeletion->isEmpty()) {
					NagiosHostQuery::create()
						->filterByPrimaryKeys($this->nagiosHostsRelatedByNotificationPeriodScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->nagiosHostsRelatedByNotificationPeriodScheduledForDeletion = null;
				}
			}

			if ($this->collNagiosHostsRelatedByNotificationPeriod !== null) {
				foreach ($this->collNagiosHostsRelatedByNotificationPeriod as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->nagiosServiceTemplatesRelatedByCheckPeriodScheduledForDeletion !== null) {
				if (!$this->nagiosServiceTemplatesRelatedByCheckPeriodScheduledForDeletion->isEmpty()) {
					NagiosServiceTemplateQuery::create()
						->filterByPrimaryKeys($this->nagiosServiceTemplatesRelatedByCheckPeriodScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->nagiosServiceTemplatesRelatedByCheckPeriodScheduledForDeletion = null;
				}
			}

			if ($this->collNagiosServiceTemplatesRelatedByCheckPeriod !== null) {
				foreach ($this->collNagiosServiceTemplatesRelatedByCheckPeriod as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->nagiosServiceTemplatesRelatedByNotificationPeriodScheduledForDeletion !== null) {
				if (!$this->nagiosServiceTemplatesRelatedByNotificationPeriodScheduledForDeletion->isEmpty()) {
					NagiosServiceTemplateQuery::create()
						->filterByPrimaryKeys($this->nagiosServiceTemplatesRelatedByNotificationPeriodScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->nagiosServiceTemplatesRelatedByNotificationPeriodScheduledForDeletion = null;
				}
			}

			if ($this->collNagiosServiceTemplatesRelatedByNotificationPeriod !== null) {
				foreach ($this->collNagiosServiceTemplatesRelatedByNotificationPeriod as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->nagiosServicesRelatedByCheckPeriodScheduledForDeletion !== null) {
				if (!$this->nagiosServicesRelatedByCheckPeriodScheduledForDeletion->isEmpty()) {
					NagiosServiceQuery::create()
						->filterByPrimaryKeys($this->nagiosServicesRelatedByCheckPeriodScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->nagiosServicesRelatedByCheckPeriodScheduledForDeletion = null;
				}
			}

			if ($this->collNagiosServicesRelatedByCheckPeriod !== null) {
				foreach ($this->collNagiosServicesRelatedByCheckPeriod as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->nagiosServicesRelatedByNotificationPeriodScheduledForDeletion !== null) {
				if (!$this->nagiosServicesRelatedByNotificationPeriodScheduledForDeletion->isEmpty()) {
					NagiosServiceQuery::create()
						->filterByPrimaryKeys($this->nagiosServicesRelatedByNotificationPeriodScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->nagiosServicesRelatedByNotificationPeriodScheduledForDeletion = null;
				}
			}

			if ($this->collNagiosServicesRelatedByNotificationPeriod !== null) {
				foreach ($this->collNagiosServicesRelatedByNotificationPeriod as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->nagiosDependencysScheduledForDeletion !== null) {
				if (!$this->nagiosDependencysScheduledForDeletion->isEmpty()) {
					NagiosDependencyQuery::create()
						->filterByPrimaryKeys($this->nagiosDependencysScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->nagiosDependencysScheduledForDeletion = null;
				}
			}

			if ($this->collNagiosDependencys !== null) {
				foreach ($this->collNagiosDependencys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->nagiosEscalationsScheduledForDeletion !== null) {
				if (!$this->nagiosEscalationsScheduledForDeletion->isEmpty()) {
					NagiosEscalationQuery::create()
						->filterByPrimaryKeys($this->nagiosEscalationsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->nagiosEscalationsScheduledForDeletion = null;
				}
			}

			if ($this->collNagiosEscalations !== null) {
				foreach ($this->collNagiosEscalations as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Insert the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @throws     PropelException
	 * @see        doSave()
	 */
	protected function doInsert(PropelPDO $con)
	{
		$modifiedColumns = array();
		$index = 0;

		$this->modifiedColumns[] = NagiosTimeperiodPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . NagiosTimeperiodPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(NagiosTimeperiodPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(NagiosTimeperiodPeer::NAME)) {
			$modifiedColumns[':p' . $index++]  = '`NAME`';
		}
		if ($this->isColumnModified(NagiosTimeperiodPeer::ALIAS)) {
			$modifiedColumns[':p' . $index++]  = '`ALIAS`';
		}

		$sql = sprintf(
			'INSERT INTO `nagios_timeperiod` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`ID`':
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
						break;
					case '`NAME`':
						$stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
						break;
					case '`ALIAS`':
						$stmt->bindValue($identifier, $this->alias, PDO::PARAM_STR);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

		try {
			$pk = $con->lastInsertId();
		} catch (Exception $e) {
			throw new PropelException('Unable to get autoincrement id.', $e);
		}
		$this->setId($pk);

		$this->setNew(false);
	}

	/**
	 * Update the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @see        doSave()
	 */
	protected function doUpdate(PropelPDO $con)
	{
		$selectCriteria = $this->buildPkeyCriteria();
		$valuesCriteria = $this->buildCriteria();
		BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
	}

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = NagiosTimeperiodPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collNagiosTimeperiodEntrys !== null) {
					foreach ($this->collNagiosTimeperiodEntrys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNagiosTimeperiodExcludesRelatedByTimeperiodId !== null) {
					foreach ($this->collNagiosTimeperiodExcludesRelatedByTimeperiodId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod !== null) {
					foreach ($this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNagiosContactsRelatedByHostNotificationPeriod !== null) {
					foreach ($this->collNagiosContactsRelatedByHostNotificationPeriod as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNagiosContactsRelatedByServiceNotificationPeriod !== null) {
					foreach ($this->collNagiosContactsRelatedByServiceNotificationPeriod as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNagiosHostTemplatesRelatedByCheckPeriod !== null) {
					foreach ($this->collNagiosHostTemplatesRelatedByCheckPeriod as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNagiosHostTemplatesRelatedByNotificationPeriod !== null) {
					foreach ($this->collNagiosHostTemplatesRelatedByNotificationPeriod as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNagiosHostsRelatedByCheckPeriod !== null) {
					foreach ($this->collNagiosHostsRelatedByCheckPeriod as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNagiosHostsRelatedByNotificationPeriod !== null) {
					foreach ($this->collNagiosHostsRelatedByNotificationPeriod as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNagiosServiceTemplatesRelatedByCheckPeriod !== null) {
					foreach ($this->collNagiosServiceTemplatesRelatedByCheckPeriod as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNagiosServiceTemplatesRelatedByNotificationPeriod !== null) {
					foreach ($this->collNagiosServiceTemplatesRelatedByNotificationPeriod as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNagiosServicesRelatedByCheckPeriod !== null) {
					foreach ($this->collNagiosServicesRelatedByCheckPeriod as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNagiosServicesRelatedByNotificationPeriod !== null) {
					foreach ($this->collNagiosServicesRelatedByNotificationPeriod as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNagiosDependencys !== null) {
					foreach ($this->collNagiosDependencys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNagiosEscalations !== null) {
					foreach ($this->collNagiosEscalations as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NagiosTimeperiodPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getName();
				break;
			case 2:
				return $this->getAlias();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['NagiosTimeperiod'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['NagiosTimeperiod'][$this->getPrimaryKey()] = true;
		$keys = NagiosTimeperiodPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getAlias(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collNagiosTimeperiodEntrys) {
				$result['NagiosTimeperiodEntrys'] = $this->collNagiosTimeperiodEntrys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collNagiosTimeperiodExcludesRelatedByTimeperiodId) {
				$result['NagiosTimeperiodExcludesRelatedByTimeperiodId'] = $this->collNagiosTimeperiodExcludesRelatedByTimeperiodId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod) {
				$result['NagiosTimeperiodExcludesRelatedByExcludedTimeperiod'] = $this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collNagiosContactsRelatedByHostNotificationPeriod) {
				$result['NagiosContactsRelatedByHostNotificationPeriod'] = $this->collNagiosContactsRelatedByHostNotificationPeriod->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collNagiosContactsRelatedByServiceNotificationPeriod) {
				$result['NagiosContactsRelatedByServiceNotificationPeriod'] = $this->collNagiosContactsRelatedByServiceNotificationPeriod->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collNagiosHostTemplatesRelatedByCheckPeriod) {
				$result['NagiosHostTemplatesRelatedByCheckPeriod'] = $this->collNagiosHostTemplatesRelatedByCheckPeriod->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collNagiosHostTemplatesRelatedByNotificationPeriod) {
				$result['NagiosHostTemplatesRelatedByNotificationPeriod'] = $this->collNagiosHostTemplatesRelatedByNotificationPeriod->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collNagiosHostsRelatedByCheckPeriod) {
				$result['NagiosHostsRelatedByCheckPeriod'] = $this->collNagiosHostsRelatedByCheckPeriod->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collNagiosHostsRelatedByNotificationPeriod) {
				$result['NagiosHostsRelatedByNotificationPeriod'] = $this->collNagiosHostsRelatedByNotificationPeriod->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collNagiosServiceTemplatesRelatedByCheckPeriod) {
				$result['NagiosServiceTemplatesRelatedByCheckPeriod'] = $this->collNagiosServiceTemplatesRelatedByCheckPeriod->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collNagiosServiceTemplatesRelatedByNotificationPeriod) {
				$result['NagiosServiceTemplatesRelatedByNotificationPeriod'] = $this->collNagiosServiceTemplatesRelatedByNotificationPeriod->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collNagiosServicesRelatedByCheckPeriod) {
				$result['NagiosServicesRelatedByCheckPeriod'] = $this->collNagiosServicesRelatedByCheckPeriod->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collNagiosServicesRelatedByNotificationPeriod) {
				$result['NagiosServicesRelatedByNotificationPeriod'] = $this->collNagiosServicesRelatedByNotificationPeriod->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collNagiosDependencys) {
				$result['NagiosDependencys'] = $this->collNagiosDependencys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collNagiosEscalations) {
				$result['NagiosEscalations'] = $this->collNagiosEscalations->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NagiosTimeperiodPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setName($value);
				break;
			case 2:
				$this->setAlias($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NagiosTimeperiodPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAlias($arr[$keys[2]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(NagiosTimeperiodPeer::DATABASE_NAME);

		if ($this->isColumnModified(NagiosTimeperiodPeer::ID)) $criteria->add(NagiosTimeperiodPeer::ID, $this->id);
		if ($this->isColumnModified(NagiosTimeperiodPeer::NAME)) $criteria->add(NagiosTimeperiodPeer::NAME, $this->name);
		if ($this->isColumnModified(NagiosTimeperiodPeer::ALIAS)) $criteria->add(NagiosTimeperiodPeer::ALIAS, $this->alias);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NagiosTimeperiodPeer::DATABASE_NAME);
		$criteria->add(NagiosTimeperiodPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of NagiosTimeperiod (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setName($this->getName());
		$copyObj->setAlias($this->getAlias());

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getNagiosTimeperiodEntrys() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNagiosTimeperiodEntry($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNagiosTimeperiodExcludesRelatedByTimeperiodId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNagiosTimeperiodExcludeRelatedByTimeperiodId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNagiosTimeperiodExcludesRelatedByExcludedTimeperiod() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNagiosTimeperiodExcludeRelatedByExcludedTimeperiod($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNagiosContactsRelatedByHostNotificationPeriod() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNagiosContactRelatedByHostNotificationPeriod($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNagiosContactsRelatedByServiceNotificationPeriod() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNagiosContactRelatedByServiceNotificationPeriod($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNagiosHostTemplatesRelatedByCheckPeriod() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNagiosHostTemplateRelatedByCheckPeriod($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNagiosHostTemplatesRelatedByNotificationPeriod() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNagiosHostTemplateRelatedByNotificationPeriod($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNagiosHostsRelatedByCheckPeriod() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNagiosHostRelatedByCheckPeriod($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNagiosHostsRelatedByNotificationPeriod() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNagiosHostRelatedByNotificationPeriod($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNagiosServiceTemplatesRelatedByCheckPeriod() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNagiosServiceTemplateRelatedByCheckPeriod($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNagiosServiceTemplatesRelatedByNotificationPeriod() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNagiosServiceTemplateRelatedByNotificationPeriod($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNagiosServicesRelatedByCheckPeriod() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNagiosServiceRelatedByCheckPeriod($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNagiosServicesRelatedByNotificationPeriod() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNagiosServiceRelatedByNotificationPeriod($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNagiosDependencys() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNagiosDependency($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNagiosEscalations() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNagiosEscalation($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     NagiosTimeperiod Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     NagiosTimeperiodPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new NagiosTimeperiodPeer();
		}
		return self::$peer;
	}


	/**
	 * Initializes a collection based on the name of a relation.
	 * Avoids crafting an 'init[$relationName]s' method name
	 * that wouldn't work when StandardEnglishPluralizer is used.
	 *
	 * @param      string $relationName The name of the relation to initialize
	 * @return     void
	 */
	public function initRelation($relationName)
	{
		if ('NagiosTimeperiodEntry' == $relationName) {
			return $this->initNagiosTimeperiodEntrys();
		}
		if ('NagiosTimeperiodExcludeRelatedByTimeperiodId' == $relationName) {
			return $this->initNagiosTimeperiodExcludesRelatedByTimeperiodId();
		}
		if ('NagiosTimeperiodExcludeRelatedByExcludedTimeperiod' == $relationName) {
			return $this->initNagiosTimeperiodExcludesRelatedByExcludedTimeperiod();
		}
		if ('NagiosContactRelatedByHostNotificationPeriod' == $relationName) {
			return $this->initNagiosContactsRelatedByHostNotificationPeriod();
		}
		if ('NagiosContactRelatedByServiceNotificationPeriod' == $relationName) {
			return $this->initNagiosContactsRelatedByServiceNotificationPeriod();
		}
		if ('NagiosHostTemplateRelatedByCheckPeriod' == $relationName) {
			return $this->initNagiosHostTemplatesRelatedByCheckPeriod();
		}
		if ('NagiosHostTemplateRelatedByNotificationPeriod' == $relationName) {
			return $this->initNagiosHostTemplatesRelatedByNotificationPeriod();
		}
		if ('NagiosHostRelatedByCheckPeriod' == $relationName) {
			return $this->initNagiosHostsRelatedByCheckPeriod();
		}
		if ('NagiosHostRelatedByNotificationPeriod' == $relationName) {
			return $this->initNagiosHostsRelatedByNotificationPeriod();
		}
		if ('NagiosServiceTemplateRelatedByCheckPeriod' == $relationName) {
			return $this->initNagiosServiceTemplatesRelatedByCheckPeriod();
		}
		if ('NagiosServiceTemplateRelatedByNotificationPeriod' == $relationName) {
			return $this->initNagiosServiceTemplatesRelatedByNotificationPeriod();
		}
		if ('NagiosServiceRelatedByCheckPeriod' == $relationName) {
			return $this->initNagiosServicesRelatedByCheckPeriod();
		}
		if ('NagiosServiceRelatedByNotificationPeriod' == $relationName) {
			return $this->initNagiosServicesRelatedByNotificationPeriod();
		}
		if ('NagiosDependency' == $relationName) {
			return $this->initNagiosDependencys();
		}
		if ('NagiosEscalation' == $relationName) {
			return $this->initNagiosEscalations();
		}
	}

	/**
	 * Clears out the collNagiosTimeperiodEntrys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNagiosTimeperiodEntrys()
	 */
	public function clearNagiosTimeperiodEntrys()
	{
		$this->collNagiosTimeperiodEntrys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNagiosTimeperiodEntrys collection.
	 *
	 * By default this just sets the collNagiosTimeperiodEntrys collection to an empty array (like clearcollNagiosTimeperiodEntrys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNagiosTimeperiodEntrys($overrideExisting = true)
	{
		if (null !== $this->collNagiosTimeperiodEntrys && !$overrideExisting) {
			return;
		}
		$this->collNagiosTimeperiodEntrys = new PropelObjectCollection();
		$this->collNagiosTimeperiodEntrys->setModel('NagiosTimeperiodEntry');
	}

	/**
	 * Gets an array of NagiosTimeperiodEntry objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this NagiosTimeperiod is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array NagiosTimeperiodEntry[] List of NagiosTimeperiodEntry objects
	 * @throws     PropelException
	 */
	public function getNagiosTimeperiodEntrys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNagiosTimeperiodEntrys || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosTimeperiodEntrys) {
				// return empty collection
				$this->initNagiosTimeperiodEntrys();
			} else {
				$collNagiosTimeperiodEntrys = NagiosTimeperiodEntryQuery::create(null, $criteria)
					->filterByNagiosTimeperiod($this)
					->find($con);
				if (null !== $criteria) {
					return $collNagiosTimeperiodEntrys;
				}
				$this->collNagiosTimeperiodEntrys = $collNagiosTimeperiodEntrys;
			}
		}
		return $this->collNagiosTimeperiodEntrys;
	}

	/**
	 * Sets a collection of NagiosTimeperiodEntry objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $nagiosTimeperiodEntrys A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNagiosTimeperiodEntrys(PropelCollection $nagiosTimeperiodEntrys, PropelPDO $con = null)
	{
		$this->nagiosTimeperiodEntrysScheduledForDeletion = $this->getNagiosTimeperiodEntrys(new Criteria(), $con)->diff($nagiosTimeperiodEntrys);

		foreach ($nagiosTimeperiodEntrys as $nagiosTimeperiodEntry) {
			// Fix issue with collection modified by reference
			if ($nagiosTimeperiodEntry->isNew()) {
				$nagiosTimeperiodEntry->setNagiosTimeperiod($this);
			}
			$this->addNagiosTimeperiodEntry($nagiosTimeperiodEntry);
		}

		$this->collNagiosTimeperiodEntrys = $nagiosTimeperiodEntrys;
	}

	/**
	 * Returns the number of related NagiosTimeperiodEntry objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related NagiosTimeperiodEntry objects.
	 * @throws     PropelException
	 */
	public function countNagiosTimeperiodEntrys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNagiosTimeperiodEntrys || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosTimeperiodEntrys) {
				return 0;
			} else {
				$query = NagiosTimeperiodEntryQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByNagiosTimeperiod($this)
					->count($con);
			}
		} else {
			return count($this->collNagiosTimeperiodEntrys);
		}
	}

	/**
	 * Method called to associate a NagiosTimeperiodEntry object to this object
	 * through the NagiosTimeperiodEntry foreign key attribute.
	 *
	 * @param      NagiosTimeperiodEntry $l NagiosTimeperiodEntry
	 * @return     NagiosTimeperiod The current object (for fluent API support)
	 */
	public function addNagiosTimeperiodEntry(NagiosTimeperiodEntry $l)
	{
		if ($this->collNagiosTimeperiodEntrys === null) {
			$this->initNagiosTimeperiodEntrys();
		}
		if (!$this->collNagiosTimeperiodEntrys->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNagiosTimeperiodEntry($l);
		}

		return $this;
	}

	/**
	 * @param	NagiosTimeperiodEntry $nagiosTimeperiodEntry The nagiosTimeperiodEntry object to add.
	 */
	protected function doAddNagiosTimeperiodEntry($nagiosTimeperiodEntry)
	{
		$this->collNagiosTimeperiodEntrys[]= $nagiosTimeperiodEntry;
		$nagiosTimeperiodEntry->setNagiosTimeperiod($this);
	}

	/**
	 * Clears out the collNagiosTimeperiodExcludesRelatedByTimeperiodId collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNagiosTimeperiodExcludesRelatedByTimeperiodId()
	 */
	public function clearNagiosTimeperiodExcludesRelatedByTimeperiodId()
	{
		$this->collNagiosTimeperiodExcludesRelatedByTimeperiodId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNagiosTimeperiodExcludesRelatedByTimeperiodId collection.
	 *
	 * By default this just sets the collNagiosTimeperiodExcludesRelatedByTimeperiodId collection to an empty array (like clearcollNagiosTimeperiodExcludesRelatedByTimeperiodId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNagiosTimeperiodExcludesRelatedByTimeperiodId($overrideExisting = true)
	{
		if (null !== $this->collNagiosTimeperiodExcludesRelatedByTimeperiodId && !$overrideExisting) {
			return;
		}
		$this->collNagiosTimeperiodExcludesRelatedByTimeperiodId = new PropelObjectCollection();
		$this->collNagiosTimeperiodExcludesRelatedByTimeperiodId->setModel('NagiosTimeperiodExclude');
	}

	/**
	 * Gets an array of NagiosTimeperiodExclude objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this NagiosTimeperiod is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array NagiosTimeperiodExclude[] List of NagiosTimeperiodExclude objects
	 * @throws     PropelException
	 */
	public function getNagiosTimeperiodExcludesRelatedByTimeperiodId($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNagiosTimeperiodExcludesRelatedByTimeperiodId || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosTimeperiodExcludesRelatedByTimeperiodId) {
				// return empty collection
				$this->initNagiosTimeperiodExcludesRelatedByTimeperiodId();
			} else {
				$collNagiosTimeperiodExcludesRelatedByTimeperiodId = NagiosTimeperiodExcludeQuery::create(null, $criteria)
					->filterByNagiosTimeperiodRelatedByTimeperiodId($this)
					->find($con);
				if (null !== $criteria) {
					return $collNagiosTimeperiodExcludesRelatedByTimeperiodId;
				}
				$this->collNagiosTimeperiodExcludesRelatedByTimeperiodId = $collNagiosTimeperiodExcludesRelatedByTimeperiodId;
			}
		}
		return $this->collNagiosTimeperiodExcludesRelatedByTimeperiodId;
	}

	/**
	 * Sets a collection of NagiosTimeperiodExcludeRelatedByTimeperiodId objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $nagiosTimeperiodExcludesRelatedByTimeperiodId A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNagiosTimeperiodExcludesRelatedByTimeperiodId(PropelCollection $nagiosTimeperiodExcludesRelatedByTimeperiodId, PropelPDO $con = null)
	{
		$this->nagiosTimeperiodExcludesRelatedByTimeperiodIdScheduledForDeletion = $this->getNagiosTimeperiodExcludesRelatedByTimeperiodId(new Criteria(), $con)->diff($nagiosTimeperiodExcludesRelatedByTimeperiodId);

		foreach ($nagiosTimeperiodExcludesRelatedByTimeperiodId as $nagiosTimeperiodExcludeRelatedByTimeperiodId) {
			// Fix issue with collection modified by reference
			if ($nagiosTimeperiodExcludeRelatedByTimeperiodId->isNew()) {
				$nagiosTimeperiodExcludeRelatedByTimeperiodId->setNagiosTimeperiodRelatedByTimeperiodId($this);
			}
			$this->addNagiosTimeperiodExcludeRelatedByTimeperiodId($nagiosTimeperiodExcludeRelatedByTimeperiodId);
		}

		$this->collNagiosTimeperiodExcludesRelatedByTimeperiodId = $nagiosTimeperiodExcludesRelatedByTimeperiodId;
	}

	/**
	 * Returns the number of related NagiosTimeperiodExclude objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related NagiosTimeperiodExclude objects.
	 * @throws     PropelException
	 */
	public function countNagiosTimeperiodExcludesRelatedByTimeperiodId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNagiosTimeperiodExcludesRelatedByTimeperiodId || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosTimeperiodExcludesRelatedByTimeperiodId) {
				return 0;
			} else {
				$query = NagiosTimeperiodExcludeQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByNagiosTimeperiodRelatedByTimeperiodId($this)
					->count($con);
			}
		} else {
			return count($this->collNagiosTimeperiodExcludesRelatedByTimeperiodId);
		}
	}

	/**
	 * Method called to associate a NagiosTimeperiodExclude object to this object
	 * through the NagiosTimeperiodExclude foreign key attribute.
	 *
	 * @param      NagiosTimeperiodExclude $l NagiosTimeperiodExclude
	 * @return     NagiosTimeperiod The current object (for fluent API support)
	 */
	public function addNagiosTimeperiodExcludeRelatedByTimeperiodId(NagiosTimeperiodExclude $l)
	{
		if ($this->collNagiosTimeperiodExcludesRelatedByTimeperiodId === null) {
			$this->initNagiosTimeperiodExcludesRelatedByTimeperiodId();
		}
		if (!$this->collNagiosTimeperiodExcludesRelatedByTimeperiodId->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNagiosTimeperiodExcludeRelatedByTimeperiodId($l);
		}

		return $this;
	}

	/**
	 * @param	NagiosTimeperiodExcludeRelatedByTimeperiodId $nagiosTimeperiodExcludeRelatedByTimeperiodId The nagiosTimeperiodExcludeRelatedByTimeperiodId object to add.
	 */
	protected function doAddNagiosTimeperiodExcludeRelatedByTimeperiodId($nagiosTimeperiodExcludeRelatedByTimeperiodId)
	{
		$this->collNagiosTimeperiodExcludesRelatedByTimeperiodId[]= $nagiosTimeperiodExcludeRelatedByTimeperiodId;
		$nagiosTimeperiodExcludeRelatedByTimeperiodId->setNagiosTimeperiodRelatedByTimeperiodId($this);
	}

	/**
	 * Clears out the collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNagiosTimeperiodExcludesRelatedByExcludedTimeperiod()
	 */
	public function clearNagiosTimeperiodExcludesRelatedByExcludedTimeperiod()
	{
		$this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod collection.
	 *
	 * By default this just sets the collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod collection to an empty array (like clearcollNagiosTimeperiodExcludesRelatedByExcludedTimeperiod());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNagiosTimeperiodExcludesRelatedByExcludedTimeperiod($overrideExisting = true)
	{
		if (null !== $this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod && !$overrideExisting) {
			return;
		}
		$this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod = new PropelObjectCollection();
		$this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod->setModel('NagiosTimeperiodExclude');
	}

	/**
	 * Gets an array of NagiosTimeperiodExclude objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this NagiosTimeperiod is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array NagiosTimeperiodExclude[] List of NagiosTimeperiodExclude objects
	 * @throws     PropelException
	 */
	public function getNagiosTimeperiodExcludesRelatedByExcludedTimeperiod($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod) {
				// return empty collection
				$this->initNagiosTimeperiodExcludesRelatedByExcludedTimeperiod();
			} else {
				$collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod = NagiosTimeperiodExcludeQuery::create(null, $criteria)
					->filterByNagiosTimeperiodRelatedByExcludedTimeperiod($this)
					->find($con);
				if (null !== $criteria) {
					return $collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod;
				}
				$this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod = $collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod;
			}
		}
		return $this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod;
	}

	/**
	 * Sets a collection of NagiosTimeperiodExcludeRelatedByExcludedTimeperiod objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $nagiosTimeperiodExcludesRelatedByExcludedTimeperiod A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNagiosTimeperiodExcludesRelatedByExcludedTimeperiod(PropelCollection $nagiosTimeperiodExcludesRelatedByExcludedTimeperiod, PropelPDO $con = null)
	{
		$this->nagiosTimeperiodExcludesRelatedByExcludedTimeperiodScheduledForDeletion = $this->getNagiosTimeperiodExcludesRelatedByExcludedTimeperiod(new Criteria(), $con)->diff($nagiosTimeperiodExcludesRelatedByExcludedTimeperiod);

		foreach ($nagiosTimeperiodExcludesRelatedByExcludedTimeperiod as $nagiosTimeperiodExcludeRelatedByExcludedTimeperiod) {
			// Fix issue with collection modified by reference
			if ($nagiosTimeperiodExcludeRelatedByExcludedTimeperiod->isNew()) {
				$nagiosTimeperiodExcludeRelatedByExcludedTimeperiod->setNagiosTimeperiodRelatedByExcludedTimeperiod($this);
			}
			$this->addNagiosTimeperiodExcludeRelatedByExcludedTimeperiod($nagiosTimeperiodExcludeRelatedByExcludedTimeperiod);
		}

		$this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod = $nagiosTimeperiodExcludesRelatedByExcludedTimeperiod;
	}

	/**
	 * Returns the number of related NagiosTimeperiodExclude objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related NagiosTimeperiodExclude objects.
	 * @throws     PropelException
	 */
	public function countNagiosTimeperiodExcludesRelatedByExcludedTimeperiod(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod) {
				return 0;
			} else {
				$query = NagiosTimeperiodExcludeQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByNagiosTimeperiodRelatedByExcludedTimeperiod($this)
					->count($con);
			}
		} else {
			return count($this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod);
		}
	}

	/**
	 * Method called to associate a NagiosTimeperiodExclude object to this object
	 * through the NagiosTimeperiodExclude foreign key attribute.
	 *
	 * @param      NagiosTimeperiodExclude $l NagiosTimeperiodExclude
	 * @return     NagiosTimeperiod The current object (for fluent API support)
	 */
	public function addNagiosTimeperiodExcludeRelatedByExcludedTimeperiod(NagiosTimeperiodExclude $l)
	{
		if ($this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod === null) {
			$this->initNagiosTimeperiodExcludesRelatedByExcludedTimeperiod();
		}
		if (!$this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNagiosTimeperiodExcludeRelatedByExcludedTimeperiod($l);
		}

		return $this;
	}

	/**
	 * @param	NagiosTimeperiodExcludeRelatedByExcludedTimeperiod $nagiosTimeperiodExcludeRelatedByExcludedTimeperiod The nagiosTimeperiodExcludeRelatedByExcludedTimeperiod object to add.
	 */
	protected function doAddNagiosTimeperiodExcludeRelatedByExcludedTimeperiod($nagiosTimeperiodExcludeRelatedByExcludedTimeperiod)
	{
		$this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod[]= $nagiosTimeperiodExcludeRelatedByExcludedTimeperiod;
		$nagiosTimeperiodExcludeRelatedByExcludedTimeperiod->setNagiosTimeperiodRelatedByExcludedTimeperiod($this);
	}

	/**
	 * Clears out the collNagiosContactsRelatedByHostNotificationPeriod collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNagiosContactsRelatedByHostNotificationPeriod()
	 */
	public function clearNagiosContactsRelatedByHostNotificationPeriod()
	{
		$this->collNagiosContactsRelatedByHostNotificationPeriod = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNagiosContactsRelatedByHostNotificationPeriod collection.
	 *
	 * By default this just sets the collNagiosContactsRelatedByHostNotificationPeriod collection to an empty array (like clearcollNagiosContactsRelatedByHostNotificationPeriod());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNagiosContactsRelatedByHostNotificationPeriod($overrideExisting = true)
	{
		if (null !== $this->collNagiosContactsRelatedByHostNotificationPeriod && !$overrideExisting) {
			return;
		}
		$this->collNagiosContactsRelatedByHostNotificationPeriod = new PropelObjectCollection();
		$this->collNagiosContactsRelatedByHostNotificationPeriod->setModel('NagiosContact');
	}

	/**
	 * Gets an array of NagiosContact objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this NagiosTimeperiod is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array NagiosContact[] List of NagiosContact objects
	 * @throws     PropelException
	 */
	public function getNagiosContactsRelatedByHostNotificationPeriod($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNagiosContactsRelatedByHostNotificationPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosContactsRelatedByHostNotificationPeriod) {
				// return empty collection
				$this->initNagiosContactsRelatedByHostNotificationPeriod();
			} else {
				$collNagiosContactsRelatedByHostNotificationPeriod = NagiosContactQuery::create(null, $criteria)
					->filterByNagiosTimeperiodRelatedByHostNotificationPeriod($this)
					->find($con);
				if (null !== $criteria) {
					return $collNagiosContactsRelatedByHostNotificationPeriod;
				}
				$this->collNagiosContactsRelatedByHostNotificationPeriod = $collNagiosContactsRelatedByHostNotificationPeriod;
			}
		}
		return $this->collNagiosContactsRelatedByHostNotificationPeriod;
	}

	/**
	 * Sets a collection of NagiosContactRelatedByHostNotificationPeriod objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $nagiosContactsRelatedByHostNotificationPeriod A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNagiosContactsRelatedByHostNotificationPeriod(PropelCollection $nagiosContactsRelatedByHostNotificationPeriod, PropelPDO $con = null)
	{
		$this->nagiosContactsRelatedByHostNotificationPeriodScheduledForDeletion = $this->getNagiosContactsRelatedByHostNotificationPeriod(new Criteria(), $con)->diff($nagiosContactsRelatedByHostNotificationPeriod);

		foreach ($nagiosContactsRelatedByHostNotificationPeriod as $nagiosContactRelatedByHostNotificationPeriod) {
			// Fix issue with collection modified by reference
			if ($nagiosContactRelatedByHostNotificationPeriod->isNew()) {
				$nagiosContactRelatedByHostNotificationPeriod->setNagiosTimeperiodRelatedByHostNotificationPeriod($this);
			}
			$this->addNagiosContactRelatedByHostNotificationPeriod($nagiosContactRelatedByHostNotificationPeriod);
		}

		$this->collNagiosContactsRelatedByHostNotificationPeriod = $nagiosContactsRelatedByHostNotificationPeriod;
	}

	/**
	 * Returns the number of related NagiosContact objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related NagiosContact objects.
	 * @throws     PropelException
	 */
	public function countNagiosContactsRelatedByHostNotificationPeriod(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNagiosContactsRelatedByHostNotificationPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosContactsRelatedByHostNotificationPeriod) {
				return 0;
			} else {
				$query = NagiosContactQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByNagiosTimeperiodRelatedByHostNotificationPeriod($this)
					->count($con);
			}
		} else {
			return count($this->collNagiosContactsRelatedByHostNotificationPeriod);
		}
	}

	/**
	 * Method called to associate a NagiosContact object to this object
	 * through the NagiosContact foreign key attribute.
	 *
	 * @param      NagiosContact $l NagiosContact
	 * @return     NagiosTimeperiod The current object (for fluent API support)
	 */
	public function addNagiosContactRelatedByHostNotificationPeriod(NagiosContact $l)
	{
		if ($this->collNagiosContactsRelatedByHostNotificationPeriod === null) {
			$this->initNagiosContactsRelatedByHostNotificationPeriod();
		}
		if (!$this->collNagiosContactsRelatedByHostNotificationPeriod->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNagiosContactRelatedByHostNotificationPeriod($l);
		}

		return $this;
	}

	/**
	 * @param	NagiosContactRelatedByHostNotificationPeriod $nagiosContactRelatedByHostNotificationPeriod The nagiosContactRelatedByHostNotificationPeriod object to add.
	 */
	protected function doAddNagiosContactRelatedByHostNotificationPeriod($nagiosContactRelatedByHostNotificationPeriod)
	{
		$this->collNagiosContactsRelatedByHostNotificationPeriod[]= $nagiosContactRelatedByHostNotificationPeriod;
		$nagiosContactRelatedByHostNotificationPeriod->setNagiosTimeperiodRelatedByHostNotificationPeriod($this);
	}

	/**
	 * Clears out the collNagiosContactsRelatedByServiceNotificationPeriod collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNagiosContactsRelatedByServiceNotificationPeriod()
	 */
	public function clearNagiosContactsRelatedByServiceNotificationPeriod()
	{
		$this->collNagiosContactsRelatedByServiceNotificationPeriod = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNagiosContactsRelatedByServiceNotificationPeriod collection.
	 *
	 * By default this just sets the collNagiosContactsRelatedByServiceNotificationPeriod collection to an empty array (like clearcollNagiosContactsRelatedByServiceNotificationPeriod());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNagiosContactsRelatedByServiceNotificationPeriod($overrideExisting = true)
	{
		if (null !== $this->collNagiosContactsRelatedByServiceNotificationPeriod && !$overrideExisting) {
			return;
		}
		$this->collNagiosContactsRelatedByServiceNotificationPeriod = new PropelObjectCollection();
		$this->collNagiosContactsRelatedByServiceNotificationPeriod->setModel('NagiosContact');
	}

	/**
	 * Gets an array of NagiosContact objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this NagiosTimeperiod is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array NagiosContact[] List of NagiosContact objects
	 * @throws     PropelException
	 */
	public function getNagiosContactsRelatedByServiceNotificationPeriod($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNagiosContactsRelatedByServiceNotificationPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosContactsRelatedByServiceNotificationPeriod) {
				// return empty collection
				$this->initNagiosContactsRelatedByServiceNotificationPeriod();
			} else {
				$collNagiosContactsRelatedByServiceNotificationPeriod = NagiosContactQuery::create(null, $criteria)
					->filterByNagiosTimeperiodRelatedByServiceNotificationPeriod($this)
					->find($con);
				if (null !== $criteria) {
					return $collNagiosContactsRelatedByServiceNotificationPeriod;
				}
				$this->collNagiosContactsRelatedByServiceNotificationPeriod = $collNagiosContactsRelatedByServiceNotificationPeriod;
			}
		}
		return $this->collNagiosContactsRelatedByServiceNotificationPeriod;
	}

	/**
	 * Sets a collection of NagiosContactRelatedByServiceNotificationPeriod objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $nagiosContactsRelatedByServiceNotificationPeriod A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNagiosContactsRelatedByServiceNotificationPeriod(PropelCollection $nagiosContactsRelatedByServiceNotificationPeriod, PropelPDO $con = null)
	{
		$this->nagiosContactsRelatedByServiceNotificationPeriodScheduledForDeletion = $this->getNagiosContactsRelatedByServiceNotificationPeriod(new Criteria(), $con)->diff($nagiosContactsRelatedByServiceNotificationPeriod);

		foreach ($nagiosContactsRelatedByServiceNotificationPeriod as $nagiosContactRelatedByServiceNotificationPeriod) {
			// Fix issue with collection modified by reference
			if ($nagiosContactRelatedByServiceNotificationPeriod->isNew()) {
				$nagiosContactRelatedByServiceNotificationPeriod->setNagiosTimeperiodRelatedByServiceNotificationPeriod($this);
			}
			$this->addNagiosContactRelatedByServiceNotificationPeriod($nagiosContactRelatedByServiceNotificationPeriod);
		}

		$this->collNagiosContactsRelatedByServiceNotificationPeriod = $nagiosContactsRelatedByServiceNotificationPeriod;
	}

	/**
	 * Returns the number of related NagiosContact objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related NagiosContact objects.
	 * @throws     PropelException
	 */
	public function countNagiosContactsRelatedByServiceNotificationPeriod(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNagiosContactsRelatedByServiceNotificationPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosContactsRelatedByServiceNotificationPeriod) {
				return 0;
			} else {
				$query = NagiosContactQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByNagiosTimeperiodRelatedByServiceNotificationPeriod($this)
					->count($con);
			}
		} else {
			return count($this->collNagiosContactsRelatedByServiceNotificationPeriod);
		}
	}

	/**
	 * Method called to associate a NagiosContact object to this object
	 * through the NagiosContact foreign key attribute.
	 *
	 * @param      NagiosContact $l NagiosContact
	 * @return     NagiosTimeperiod The current object (for fluent API support)
	 */
	public function addNagiosContactRelatedByServiceNotificationPeriod(NagiosContact $l)
	{
		if ($this->collNagiosContactsRelatedByServiceNotificationPeriod === null) {
			$this->initNagiosContactsRelatedByServiceNotificationPeriod();
		}
		if (!$this->collNagiosContactsRelatedByServiceNotificationPeriod->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNagiosContactRelatedByServiceNotificationPeriod($l);
		}

		return $this;
	}

	/**
	 * @param	NagiosContactRelatedByServiceNotificationPeriod $nagiosContactRelatedByServiceNotificationPeriod The nagiosContactRelatedByServiceNotificationPeriod object to add.
	 */
	protected function doAddNagiosContactRelatedByServiceNotificationPeriod($nagiosContactRelatedByServiceNotificationPeriod)
	{
		$this->collNagiosContactsRelatedByServiceNotificationPeriod[]= $nagiosContactRelatedByServiceNotificationPeriod;
		$nagiosContactRelatedByServiceNotificationPeriod->setNagiosTimeperiodRelatedByServiceNotificationPeriod($this);
	}

	/**
	 * Clears out the collNagiosHostTemplatesRelatedByCheckPeriod collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNagiosHostTemplatesRelatedByCheckPeriod()
	 */
	public function clearNagiosHostTemplatesRelatedByCheckPeriod()
	{
		$this->collNagiosHostTemplatesRelatedByCheckPeriod = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNagiosHostTemplatesRelatedByCheckPeriod collection.
	 *
	 * By default this just sets the collNagiosHostTemplatesRelatedByCheckPeriod collection to an empty array (like clearcollNagiosHostTemplatesRelatedByCheckPeriod());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNagiosHostTemplatesRelatedByCheckPeriod($overrideExisting = true)
	{
		if (null !== $this->collNagiosHostTemplatesRelatedByCheckPeriod && !$overrideExisting) {
			return;
		}
		$this->collNagiosHostTemplatesRelatedByCheckPeriod = new PropelObjectCollection();
		$this->collNagiosHostTemplatesRelatedByCheckPeriod->setModel('NagiosHostTemplate');
	}

	/**
	 * Gets an array of NagiosHostTemplate objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this NagiosTimeperiod is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array NagiosHostTemplate[] List of NagiosHostTemplate objects
	 * @throws     PropelException
	 */
	public function getNagiosHostTemplatesRelatedByCheckPeriod($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNagiosHostTemplatesRelatedByCheckPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosHostTemplatesRelatedByCheckPeriod) {
				// return empty collection
				$this->initNagiosHostTemplatesRelatedByCheckPeriod();
			} else {
				$collNagiosHostTemplatesRelatedByCheckPeriod = NagiosHostTemplateQuery::create(null, $criteria)
					->filterByNagiosTimeperiodRelatedByCheckPeriod($this)
					->find($con);
				if (null !== $criteria) {
					return $collNagiosHostTemplatesRelatedByCheckPeriod;
				}
				$this->collNagiosHostTemplatesRelatedByCheckPeriod = $collNagiosHostTemplatesRelatedByCheckPeriod;
			}
		}
		return $this->collNagiosHostTemplatesRelatedByCheckPeriod;
	}

	/**
	 * Sets a collection of NagiosHostTemplateRelatedByCheckPeriod objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $nagiosHostTemplatesRelatedByCheckPeriod A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNagiosHostTemplatesRelatedByCheckPeriod(PropelCollection $nagiosHostTemplatesRelatedByCheckPeriod, PropelPDO $con = null)
	{
		$this->nagiosHostTemplatesRelatedByCheckPeriodScheduledForDeletion = $this->getNagiosHostTemplatesRelatedByCheckPeriod(new Criteria(), $con)->diff($nagiosHostTemplatesRelatedByCheckPeriod);

		foreach ($nagiosHostTemplatesRelatedByCheckPeriod as $nagiosHostTemplateRelatedByCheckPeriod) {
			// Fix issue with collection modified by reference
			if ($nagiosHostTemplateRelatedByCheckPeriod->isNew()) {
				$nagiosHostTemplateRelatedByCheckPeriod->setNagiosTimeperiodRelatedByCheckPeriod($this);
			}
			$this->addNagiosHostTemplateRelatedByCheckPeriod($nagiosHostTemplateRelatedByCheckPeriod);
		}

		$this->collNagiosHostTemplatesRelatedByCheckPeriod = $nagiosHostTemplatesRelatedByCheckPeriod;
	}

	/**
	 * Returns the number of related NagiosHostTemplate objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related NagiosHostTemplate objects.
	 * @throws     PropelException
	 */
	public function countNagiosHostTemplatesRelatedByCheckPeriod(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNagiosHostTemplatesRelatedByCheckPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosHostTemplatesRelatedByCheckPeriod) {
				return 0;
			} else {
				$query = NagiosHostTemplateQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByNagiosTimeperiodRelatedByCheckPeriod($this)
					->count($con);
			}
		} else {
			return count($this->collNagiosHostTemplatesRelatedByCheckPeriod);
		}
	}

	/**
	 * Method called to associate a NagiosHostTemplate object to this object
	 * through the NagiosHostTemplate foreign key attribute.
	 *
	 * @param      NagiosHostTemplate $l NagiosHostTemplate
	 * @return     NagiosTimeperiod The current object (for fluent API support)
	 */
	public function addNagiosHostTemplateRelatedByCheckPeriod(NagiosHostTemplate $l)
	{
		if ($this->collNagiosHostTemplatesRelatedByCheckPeriod === null) {
			$this->initNagiosHostTemplatesRelatedByCheckPeriod();
		}
		if (!$this->collNagiosHostTemplatesRelatedByCheckPeriod->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNagiosHostTemplateRelatedByCheckPeriod($l);
		}

		return $this;
	}

	/**
	 * @param	NagiosHostTemplateRelatedByCheckPeriod $nagiosHostTemplateRelatedByCheckPeriod The nagiosHostTemplateRelatedByCheckPeriod object to add.
	 */
	protected function doAddNagiosHostTemplateRelatedByCheckPeriod($nagiosHostTemplateRelatedByCheckPeriod)
	{
		$this->collNagiosHostTemplatesRelatedByCheckPeriod[]= $nagiosHostTemplateRelatedByCheckPeriod;
		$nagiosHostTemplateRelatedByCheckPeriod->setNagiosTimeperiodRelatedByCheckPeriod($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosHostTemplatesRelatedByCheckPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosHostTemplate[] List of NagiosHostTemplate objects
	 */
	public function getNagiosHostTemplatesRelatedByCheckPeriodJoinNagiosCommandRelatedByCheckCommand($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosHostTemplateQuery::create(null, $criteria);
		$query->joinWith('NagiosCommandRelatedByCheckCommand', $join_behavior);

		return $this->getNagiosHostTemplatesRelatedByCheckPeriod($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosHostTemplatesRelatedByCheckPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosHostTemplate[] List of NagiosHostTemplate objects
	 */
	public function getNagiosHostTemplatesRelatedByCheckPeriodJoinNagiosCommandRelatedByEventHandler($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosHostTemplateQuery::create(null, $criteria);
		$query->joinWith('NagiosCommandRelatedByEventHandler', $join_behavior);

		return $this->getNagiosHostTemplatesRelatedByCheckPeriod($query, $con);
	}

	/**
	 * Clears out the collNagiosHostTemplatesRelatedByNotificationPeriod collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNagiosHostTemplatesRelatedByNotificationPeriod()
	 */
	public function clearNagiosHostTemplatesRelatedByNotificationPeriod()
	{
		$this->collNagiosHostTemplatesRelatedByNotificationPeriod = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNagiosHostTemplatesRelatedByNotificationPeriod collection.
	 *
	 * By default this just sets the collNagiosHostTemplatesRelatedByNotificationPeriod collection to an empty array (like clearcollNagiosHostTemplatesRelatedByNotificationPeriod());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNagiosHostTemplatesRelatedByNotificationPeriod($overrideExisting = true)
	{
		if (null !== $this->collNagiosHostTemplatesRelatedByNotificationPeriod && !$overrideExisting) {
			return;
		}
		$this->collNagiosHostTemplatesRelatedByNotificationPeriod = new PropelObjectCollection();
		$this->collNagiosHostTemplatesRelatedByNotificationPeriod->setModel('NagiosHostTemplate');
	}

	/**
	 * Gets an array of NagiosHostTemplate objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this NagiosTimeperiod is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array NagiosHostTemplate[] List of NagiosHostTemplate objects
	 * @throws     PropelException
	 */
	public function getNagiosHostTemplatesRelatedByNotificationPeriod($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNagiosHostTemplatesRelatedByNotificationPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosHostTemplatesRelatedByNotificationPeriod) {
				// return empty collection
				$this->initNagiosHostTemplatesRelatedByNotificationPeriod();
			} else {
				$collNagiosHostTemplatesRelatedByNotificationPeriod = NagiosHostTemplateQuery::create(null, $criteria)
					->filterByNagiosTimeperiodRelatedByNotificationPeriod($this)
					->find($con);
				if (null !== $criteria) {
					return $collNagiosHostTemplatesRelatedByNotificationPeriod;
				}
				$this->collNagiosHostTemplatesRelatedByNotificationPeriod = $collNagiosHostTemplatesRelatedByNotificationPeriod;
			}
		}
		return $this->collNagiosHostTemplatesRelatedByNotificationPeriod;
	}

	/**
	 * Sets a collection of NagiosHostTemplateRelatedByNotificationPeriod objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $nagiosHostTemplatesRelatedByNotificationPeriod A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNagiosHostTemplatesRelatedByNotificationPeriod(PropelCollection $nagiosHostTemplatesRelatedByNotificationPeriod, PropelPDO $con = null)
	{
		$this->nagiosHostTemplatesRelatedByNotificationPeriodScheduledForDeletion = $this->getNagiosHostTemplatesRelatedByNotificationPeriod(new Criteria(), $con)->diff($nagiosHostTemplatesRelatedByNotificationPeriod);

		foreach ($nagiosHostTemplatesRelatedByNotificationPeriod as $nagiosHostTemplateRelatedByNotificationPeriod) {
			// Fix issue with collection modified by reference
			if ($nagiosHostTemplateRelatedByNotificationPeriod->isNew()) {
				$nagiosHostTemplateRelatedByNotificationPeriod->setNagiosTimeperiodRelatedByNotificationPeriod($this);
			}
			$this->addNagiosHostTemplateRelatedByNotificationPeriod($nagiosHostTemplateRelatedByNotificationPeriod);
		}

		$this->collNagiosHostTemplatesRelatedByNotificationPeriod = $nagiosHostTemplatesRelatedByNotificationPeriod;
	}

	/**
	 * Returns the number of related NagiosHostTemplate objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related NagiosHostTemplate objects.
	 * @throws     PropelException
	 */
	public function countNagiosHostTemplatesRelatedByNotificationPeriod(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNagiosHostTemplatesRelatedByNotificationPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosHostTemplatesRelatedByNotificationPeriod) {
				return 0;
			} else {
				$query = NagiosHostTemplateQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByNagiosTimeperiodRelatedByNotificationPeriod($this)
					->count($con);
			}
		} else {
			return count($this->collNagiosHostTemplatesRelatedByNotificationPeriod);
		}
	}

	/**
	 * Method called to associate a NagiosHostTemplate object to this object
	 * through the NagiosHostTemplate foreign key attribute.
	 *
	 * @param      NagiosHostTemplate $l NagiosHostTemplate
	 * @return     NagiosTimeperiod The current object (for fluent API support)
	 */
	public function addNagiosHostTemplateRelatedByNotificationPeriod(NagiosHostTemplate $l)
	{
		if ($this->collNagiosHostTemplatesRelatedByNotificationPeriod === null) {
			$this->initNagiosHostTemplatesRelatedByNotificationPeriod();
		}
		if (!$this->collNagiosHostTemplatesRelatedByNotificationPeriod->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNagiosHostTemplateRelatedByNotificationPeriod($l);
		}

		return $this;
	}

	/**
	 * @param	NagiosHostTemplateRelatedByNotificationPeriod $nagiosHostTemplateRelatedByNotificationPeriod The nagiosHostTemplateRelatedByNotificationPeriod object to add.
	 */
	protected function doAddNagiosHostTemplateRelatedByNotificationPeriod($nagiosHostTemplateRelatedByNotificationPeriod)
	{
		$this->collNagiosHostTemplatesRelatedByNotificationPeriod[]= $nagiosHostTemplateRelatedByNotificationPeriod;
		$nagiosHostTemplateRelatedByNotificationPeriod->setNagiosTimeperiodRelatedByNotificationPeriod($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosHostTemplatesRelatedByNotificationPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosHostTemplate[] List of NagiosHostTemplate objects
	 */
	public function getNagiosHostTemplatesRelatedByNotificationPeriodJoinNagiosCommandRelatedByCheckCommand($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosHostTemplateQuery::create(null, $criteria);
		$query->joinWith('NagiosCommandRelatedByCheckCommand', $join_behavior);

		return $this->getNagiosHostTemplatesRelatedByNotificationPeriod($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosHostTemplatesRelatedByNotificationPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosHostTemplate[] List of NagiosHostTemplate objects
	 */
	public function getNagiosHostTemplatesRelatedByNotificationPeriodJoinNagiosCommandRelatedByEventHandler($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosHostTemplateQuery::create(null, $criteria);
		$query->joinWith('NagiosCommandRelatedByEventHandler', $join_behavior);

		return $this->getNagiosHostTemplatesRelatedByNotificationPeriod($query, $con);
	}

	/**
	 * Clears out the collNagiosHostsRelatedByCheckPeriod collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNagiosHostsRelatedByCheckPeriod()
	 */
	public function clearNagiosHostsRelatedByCheckPeriod()
	{
		$this->collNagiosHostsRelatedByCheckPeriod = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNagiosHostsRelatedByCheckPeriod collection.
	 *
	 * By default this just sets the collNagiosHostsRelatedByCheckPeriod collection to an empty array (like clearcollNagiosHostsRelatedByCheckPeriod());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNagiosHostsRelatedByCheckPeriod($overrideExisting = true)
	{
		if (null !== $this->collNagiosHostsRelatedByCheckPeriod && !$overrideExisting) {
			return;
		}
		$this->collNagiosHostsRelatedByCheckPeriod = new PropelObjectCollection();
		$this->collNagiosHostsRelatedByCheckPeriod->setModel('NagiosHost');
	}

	/**
	 * Gets an array of NagiosHost objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this NagiosTimeperiod is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array NagiosHost[] List of NagiosHost objects
	 * @throws     PropelException
	 */
	public function getNagiosHostsRelatedByCheckPeriod($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNagiosHostsRelatedByCheckPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosHostsRelatedByCheckPeriod) {
				// return empty collection
				$this->initNagiosHostsRelatedByCheckPeriod();
			} else {
				$collNagiosHostsRelatedByCheckPeriod = NagiosHostQuery::create(null, $criteria)
					->filterByNagiosTimeperiodRelatedByCheckPeriod($this)
					->find($con);
				if (null !== $criteria) {
					return $collNagiosHostsRelatedByCheckPeriod;
				}
				$this->collNagiosHostsRelatedByCheckPeriod = $collNagiosHostsRelatedByCheckPeriod;
			}
		}
		return $this->collNagiosHostsRelatedByCheckPeriod;
	}

	/**
	 * Sets a collection of NagiosHostRelatedByCheckPeriod objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $nagiosHostsRelatedByCheckPeriod A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNagiosHostsRelatedByCheckPeriod(PropelCollection $nagiosHostsRelatedByCheckPeriod, PropelPDO $con = null)
	{
		$this->nagiosHostsRelatedByCheckPeriodScheduledForDeletion = $this->getNagiosHostsRelatedByCheckPeriod(new Criteria(), $con)->diff($nagiosHostsRelatedByCheckPeriod);

		foreach ($nagiosHostsRelatedByCheckPeriod as $nagiosHostRelatedByCheckPeriod) {
			// Fix issue with collection modified by reference
			if ($nagiosHostRelatedByCheckPeriod->isNew()) {
				$nagiosHostRelatedByCheckPeriod->setNagiosTimeperiodRelatedByCheckPeriod($this);
			}
			$this->addNagiosHostRelatedByCheckPeriod($nagiosHostRelatedByCheckPeriod);
		}

		$this->collNagiosHostsRelatedByCheckPeriod = $nagiosHostsRelatedByCheckPeriod;
	}

	/**
	 * Returns the number of related NagiosHost objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related NagiosHost objects.
	 * @throws     PropelException
	 */
	public function countNagiosHostsRelatedByCheckPeriod(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNagiosHostsRelatedByCheckPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosHostsRelatedByCheckPeriod) {
				return 0;
			} else {
				$query = NagiosHostQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByNagiosTimeperiodRelatedByCheckPeriod($this)
					->count($con);
			}
		} else {
			return count($this->collNagiosHostsRelatedByCheckPeriod);
		}
	}

	/**
	 * Method called to associate a NagiosHost object to this object
	 * through the NagiosHost foreign key attribute.
	 *
	 * @param      NagiosHost $l NagiosHost
	 * @return     NagiosTimeperiod The current object (for fluent API support)
	 */
	public function addNagiosHostRelatedByCheckPeriod(NagiosHost $l)
	{
		if ($this->collNagiosHostsRelatedByCheckPeriod === null) {
			$this->initNagiosHostsRelatedByCheckPeriod();
		}
		if (!$this->collNagiosHostsRelatedByCheckPeriod->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNagiosHostRelatedByCheckPeriod($l);
		}

		return $this;
	}

	/**
	 * @param	NagiosHostRelatedByCheckPeriod $nagiosHostRelatedByCheckPeriod The nagiosHostRelatedByCheckPeriod object to add.
	 */
	protected function doAddNagiosHostRelatedByCheckPeriod($nagiosHostRelatedByCheckPeriod)
	{
		$this->collNagiosHostsRelatedByCheckPeriod[]= $nagiosHostRelatedByCheckPeriod;
		$nagiosHostRelatedByCheckPeriod->setNagiosTimeperiodRelatedByCheckPeriod($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosHostsRelatedByCheckPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosHost[] List of NagiosHost objects
	 */
	public function getNagiosHostsRelatedByCheckPeriodJoinNagiosCommandRelatedByCheckCommand($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosHostQuery::create(null, $criteria);
		$query->joinWith('NagiosCommandRelatedByCheckCommand', $join_behavior);

		return $this->getNagiosHostsRelatedByCheckPeriod($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosHostsRelatedByCheckPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosHost[] List of NagiosHost objects
	 */
	public function getNagiosHostsRelatedByCheckPeriodJoinNagiosCommandRelatedByEventHandler($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosHostQuery::create(null, $criteria);
		$query->joinWith('NagiosCommandRelatedByEventHandler', $join_behavior);

		return $this->getNagiosHostsRelatedByCheckPeriod($query, $con);
	}

	/**
	 * Clears out the collNagiosHostsRelatedByNotificationPeriod collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNagiosHostsRelatedByNotificationPeriod()
	 */
	public function clearNagiosHostsRelatedByNotificationPeriod()
	{
		$this->collNagiosHostsRelatedByNotificationPeriod = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNagiosHostsRelatedByNotificationPeriod collection.
	 *
	 * By default this just sets the collNagiosHostsRelatedByNotificationPeriod collection to an empty array (like clearcollNagiosHostsRelatedByNotificationPeriod());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNagiosHostsRelatedByNotificationPeriod($overrideExisting = true)
	{
		if (null !== $this->collNagiosHostsRelatedByNotificationPeriod && !$overrideExisting) {
			return;
		}
		$this->collNagiosHostsRelatedByNotificationPeriod = new PropelObjectCollection();
		$this->collNagiosHostsRelatedByNotificationPeriod->setModel('NagiosHost');
	}

	/**
	 * Gets an array of NagiosHost objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this NagiosTimeperiod is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array NagiosHost[] List of NagiosHost objects
	 * @throws     PropelException
	 */
	public function getNagiosHostsRelatedByNotificationPeriod($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNagiosHostsRelatedByNotificationPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosHostsRelatedByNotificationPeriod) {
				// return empty collection
				$this->initNagiosHostsRelatedByNotificationPeriod();
			} else {
				$collNagiosHostsRelatedByNotificationPeriod = NagiosHostQuery::create(null, $criteria)
					->filterByNagiosTimeperiodRelatedByNotificationPeriod($this)
					->find($con);
				if (null !== $criteria) {
					return $collNagiosHostsRelatedByNotificationPeriod;
				}
				$this->collNagiosHostsRelatedByNotificationPeriod = $collNagiosHostsRelatedByNotificationPeriod;
			}
		}
		return $this->collNagiosHostsRelatedByNotificationPeriod;
	}

	/**
	 * Sets a collection of NagiosHostRelatedByNotificationPeriod objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $nagiosHostsRelatedByNotificationPeriod A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNagiosHostsRelatedByNotificationPeriod(PropelCollection $nagiosHostsRelatedByNotificationPeriod, PropelPDO $con = null)
	{
		$this->nagiosHostsRelatedByNotificationPeriodScheduledForDeletion = $this->getNagiosHostsRelatedByNotificationPeriod(new Criteria(), $con)->diff($nagiosHostsRelatedByNotificationPeriod);

		foreach ($nagiosHostsRelatedByNotificationPeriod as $nagiosHostRelatedByNotificationPeriod) {
			// Fix issue with collection modified by reference
			if ($nagiosHostRelatedByNotificationPeriod->isNew()) {
				$nagiosHostRelatedByNotificationPeriod->setNagiosTimeperiodRelatedByNotificationPeriod($this);
			}
			$this->addNagiosHostRelatedByNotificationPeriod($nagiosHostRelatedByNotificationPeriod);
		}

		$this->collNagiosHostsRelatedByNotificationPeriod = $nagiosHostsRelatedByNotificationPeriod;
	}

	/**
	 * Returns the number of related NagiosHost objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related NagiosHost objects.
	 * @throws     PropelException
	 */
	public function countNagiosHostsRelatedByNotificationPeriod(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNagiosHostsRelatedByNotificationPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosHostsRelatedByNotificationPeriod) {
				return 0;
			} else {
				$query = NagiosHostQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByNagiosTimeperiodRelatedByNotificationPeriod($this)
					->count($con);
			}
		} else {
			return count($this->collNagiosHostsRelatedByNotificationPeriod);
		}
	}

	/**
	 * Method called to associate a NagiosHost object to this object
	 * through the NagiosHost foreign key attribute.
	 *
	 * @param      NagiosHost $l NagiosHost
	 * @return     NagiosTimeperiod The current object (for fluent API support)
	 */
	public function addNagiosHostRelatedByNotificationPeriod(NagiosHost $l)
	{
		if ($this->collNagiosHostsRelatedByNotificationPeriod === null) {
			$this->initNagiosHostsRelatedByNotificationPeriod();
		}
		if (!$this->collNagiosHostsRelatedByNotificationPeriod->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNagiosHostRelatedByNotificationPeriod($l);
		}

		return $this;
	}

	/**
	 * @param	NagiosHostRelatedByNotificationPeriod $nagiosHostRelatedByNotificationPeriod The nagiosHostRelatedByNotificationPeriod object to add.
	 */
	protected function doAddNagiosHostRelatedByNotificationPeriod($nagiosHostRelatedByNotificationPeriod)
	{
		$this->collNagiosHostsRelatedByNotificationPeriod[]= $nagiosHostRelatedByNotificationPeriod;
		$nagiosHostRelatedByNotificationPeriod->setNagiosTimeperiodRelatedByNotificationPeriod($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosHostsRelatedByNotificationPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosHost[] List of NagiosHost objects
	 */
	public function getNagiosHostsRelatedByNotificationPeriodJoinNagiosCommandRelatedByCheckCommand($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosHostQuery::create(null, $criteria);
		$query->joinWith('NagiosCommandRelatedByCheckCommand', $join_behavior);

		return $this->getNagiosHostsRelatedByNotificationPeriod($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosHostsRelatedByNotificationPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosHost[] List of NagiosHost objects
	 */
	public function getNagiosHostsRelatedByNotificationPeriodJoinNagiosCommandRelatedByEventHandler($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosHostQuery::create(null, $criteria);
		$query->joinWith('NagiosCommandRelatedByEventHandler', $join_behavior);

		return $this->getNagiosHostsRelatedByNotificationPeriod($query, $con);
	}

	/**
	 * Clears out the collNagiosServiceTemplatesRelatedByCheckPeriod collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNagiosServiceTemplatesRelatedByCheckPeriod()
	 */
	public function clearNagiosServiceTemplatesRelatedByCheckPeriod()
	{
		$this->collNagiosServiceTemplatesRelatedByCheckPeriod = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNagiosServiceTemplatesRelatedByCheckPeriod collection.
	 *
	 * By default this just sets the collNagiosServiceTemplatesRelatedByCheckPeriod collection to an empty array (like clearcollNagiosServiceTemplatesRelatedByCheckPeriod());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNagiosServiceTemplatesRelatedByCheckPeriod($overrideExisting = true)
	{
		if (null !== $this->collNagiosServiceTemplatesRelatedByCheckPeriod && !$overrideExisting) {
			return;
		}
		$this->collNagiosServiceTemplatesRelatedByCheckPeriod = new PropelObjectCollection();
		$this->collNagiosServiceTemplatesRelatedByCheckPeriod->setModel('NagiosServiceTemplate');
	}

	/**
	 * Gets an array of NagiosServiceTemplate objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this NagiosTimeperiod is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array NagiosServiceTemplate[] List of NagiosServiceTemplate objects
	 * @throws     PropelException
	 */
	public function getNagiosServiceTemplatesRelatedByCheckPeriod($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNagiosServiceTemplatesRelatedByCheckPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosServiceTemplatesRelatedByCheckPeriod) {
				// return empty collection
				$this->initNagiosServiceTemplatesRelatedByCheckPeriod();
			} else {
				$collNagiosServiceTemplatesRelatedByCheckPeriod = NagiosServiceTemplateQuery::create(null, $criteria)
					->filterByNagiosTimeperiodRelatedByCheckPeriod($this)
					->find($con);
				if (null !== $criteria) {
					return $collNagiosServiceTemplatesRelatedByCheckPeriod;
				}
				$this->collNagiosServiceTemplatesRelatedByCheckPeriod = $collNagiosServiceTemplatesRelatedByCheckPeriod;
			}
		}
		return $this->collNagiosServiceTemplatesRelatedByCheckPeriod;
	}

	/**
	 * Sets a collection of NagiosServiceTemplateRelatedByCheckPeriod objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $nagiosServiceTemplatesRelatedByCheckPeriod A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNagiosServiceTemplatesRelatedByCheckPeriod(PropelCollection $nagiosServiceTemplatesRelatedByCheckPeriod, PropelPDO $con = null)
	{
		$this->nagiosServiceTemplatesRelatedByCheckPeriodScheduledForDeletion = $this->getNagiosServiceTemplatesRelatedByCheckPeriod(new Criteria(), $con)->diff($nagiosServiceTemplatesRelatedByCheckPeriod);

		foreach ($nagiosServiceTemplatesRelatedByCheckPeriod as $nagiosServiceTemplateRelatedByCheckPeriod) {
			// Fix issue with collection modified by reference
			if ($nagiosServiceTemplateRelatedByCheckPeriod->isNew()) {
				$nagiosServiceTemplateRelatedByCheckPeriod->setNagiosTimeperiodRelatedByCheckPeriod($this);
			}
			$this->addNagiosServiceTemplateRelatedByCheckPeriod($nagiosServiceTemplateRelatedByCheckPeriod);
		}

		$this->collNagiosServiceTemplatesRelatedByCheckPeriod = $nagiosServiceTemplatesRelatedByCheckPeriod;
	}

	/**
	 * Returns the number of related NagiosServiceTemplate objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related NagiosServiceTemplate objects.
	 * @throws     PropelException
	 */
	public function countNagiosServiceTemplatesRelatedByCheckPeriod(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNagiosServiceTemplatesRelatedByCheckPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosServiceTemplatesRelatedByCheckPeriod) {
				return 0;
			} else {
				$query = NagiosServiceTemplateQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByNagiosTimeperiodRelatedByCheckPeriod($this)
					->count($con);
			}
		} else {
			return count($this->collNagiosServiceTemplatesRelatedByCheckPeriod);
		}
	}

	/**
	 * Method called to associate a NagiosServiceTemplate object to this object
	 * through the NagiosServiceTemplate foreign key attribute.
	 *
	 * @param      NagiosServiceTemplate $l NagiosServiceTemplate
	 * @return     NagiosTimeperiod The current object (for fluent API support)
	 */
	public function addNagiosServiceTemplateRelatedByCheckPeriod(NagiosServiceTemplate $l)
	{
		if ($this->collNagiosServiceTemplatesRelatedByCheckPeriod === null) {
			$this->initNagiosServiceTemplatesRelatedByCheckPeriod();
		}
		if (!$this->collNagiosServiceTemplatesRelatedByCheckPeriod->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNagiosServiceTemplateRelatedByCheckPeriod($l);
		}

		return $this;
	}

	/**
	 * @param	NagiosServiceTemplateRelatedByCheckPeriod $nagiosServiceTemplateRelatedByCheckPeriod The nagiosServiceTemplateRelatedByCheckPeriod object to add.
	 */
	protected function doAddNagiosServiceTemplateRelatedByCheckPeriod($nagiosServiceTemplateRelatedByCheckPeriod)
	{
		$this->collNagiosServiceTemplatesRelatedByCheckPeriod[]= $nagiosServiceTemplateRelatedByCheckPeriod;
		$nagiosServiceTemplateRelatedByCheckPeriod->setNagiosTimeperiodRelatedByCheckPeriod($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosServiceTemplatesRelatedByCheckPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosServiceTemplate[] List of NagiosServiceTemplate objects
	 */
	public function getNagiosServiceTemplatesRelatedByCheckPeriodJoinNagiosCommandRelatedByCheckCommand($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosServiceTemplateQuery::create(null, $criteria);
		$query->joinWith('NagiosCommandRelatedByCheckCommand', $join_behavior);

		return $this->getNagiosServiceTemplatesRelatedByCheckPeriod($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosServiceTemplatesRelatedByCheckPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosServiceTemplate[] List of NagiosServiceTemplate objects
	 */
	public function getNagiosServiceTemplatesRelatedByCheckPeriodJoinNagiosCommandRelatedByEventHandler($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosServiceTemplateQuery::create(null, $criteria);
		$query->joinWith('NagiosCommandRelatedByEventHandler', $join_behavior);

		return $this->getNagiosServiceTemplatesRelatedByCheckPeriod($query, $con);
	}

	/**
	 * Clears out the collNagiosServiceTemplatesRelatedByNotificationPeriod collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNagiosServiceTemplatesRelatedByNotificationPeriod()
	 */
	public function clearNagiosServiceTemplatesRelatedByNotificationPeriod()
	{
		$this->collNagiosServiceTemplatesRelatedByNotificationPeriod = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNagiosServiceTemplatesRelatedByNotificationPeriod collection.
	 *
	 * By default this just sets the collNagiosServiceTemplatesRelatedByNotificationPeriod collection to an empty array (like clearcollNagiosServiceTemplatesRelatedByNotificationPeriod());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNagiosServiceTemplatesRelatedByNotificationPeriod($overrideExisting = true)
	{
		if (null !== $this->collNagiosServiceTemplatesRelatedByNotificationPeriod && !$overrideExisting) {
			return;
		}
		$this->collNagiosServiceTemplatesRelatedByNotificationPeriod = new PropelObjectCollection();
		$this->collNagiosServiceTemplatesRelatedByNotificationPeriod->setModel('NagiosServiceTemplate');
	}

	/**
	 * Gets an array of NagiosServiceTemplate objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this NagiosTimeperiod is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array NagiosServiceTemplate[] List of NagiosServiceTemplate objects
	 * @throws     PropelException
	 */
	public function getNagiosServiceTemplatesRelatedByNotificationPeriod($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNagiosServiceTemplatesRelatedByNotificationPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosServiceTemplatesRelatedByNotificationPeriod) {
				// return empty collection
				$this->initNagiosServiceTemplatesRelatedByNotificationPeriod();
			} else {
				$collNagiosServiceTemplatesRelatedByNotificationPeriod = NagiosServiceTemplateQuery::create(null, $criteria)
					->filterByNagiosTimeperiodRelatedByNotificationPeriod($this)
					->find($con);
				if (null !== $criteria) {
					return $collNagiosServiceTemplatesRelatedByNotificationPeriod;
				}
				$this->collNagiosServiceTemplatesRelatedByNotificationPeriod = $collNagiosServiceTemplatesRelatedByNotificationPeriod;
			}
		}
		return $this->collNagiosServiceTemplatesRelatedByNotificationPeriod;
	}

	/**
	 * Sets a collection of NagiosServiceTemplateRelatedByNotificationPeriod objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $nagiosServiceTemplatesRelatedByNotificationPeriod A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNagiosServiceTemplatesRelatedByNotificationPeriod(PropelCollection $nagiosServiceTemplatesRelatedByNotificationPeriod, PropelPDO $con = null)
	{
		$this->nagiosServiceTemplatesRelatedByNotificationPeriodScheduledForDeletion = $this->getNagiosServiceTemplatesRelatedByNotificationPeriod(new Criteria(), $con)->diff($nagiosServiceTemplatesRelatedByNotificationPeriod);

		foreach ($nagiosServiceTemplatesRelatedByNotificationPeriod as $nagiosServiceTemplateRelatedByNotificationPeriod) {
			// Fix issue with collection modified by reference
			if ($nagiosServiceTemplateRelatedByNotificationPeriod->isNew()) {
				$nagiosServiceTemplateRelatedByNotificationPeriod->setNagiosTimeperiodRelatedByNotificationPeriod($this);
			}
			$this->addNagiosServiceTemplateRelatedByNotificationPeriod($nagiosServiceTemplateRelatedByNotificationPeriod);
		}

		$this->collNagiosServiceTemplatesRelatedByNotificationPeriod = $nagiosServiceTemplatesRelatedByNotificationPeriod;
	}

	/**
	 * Returns the number of related NagiosServiceTemplate objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related NagiosServiceTemplate objects.
	 * @throws     PropelException
	 */
	public function countNagiosServiceTemplatesRelatedByNotificationPeriod(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNagiosServiceTemplatesRelatedByNotificationPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosServiceTemplatesRelatedByNotificationPeriod) {
				return 0;
			} else {
				$query = NagiosServiceTemplateQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByNagiosTimeperiodRelatedByNotificationPeriod($this)
					->count($con);
			}
		} else {
			return count($this->collNagiosServiceTemplatesRelatedByNotificationPeriod);
		}
	}

	/**
	 * Method called to associate a NagiosServiceTemplate object to this object
	 * through the NagiosServiceTemplate foreign key attribute.
	 *
	 * @param      NagiosServiceTemplate $l NagiosServiceTemplate
	 * @return     NagiosTimeperiod The current object (for fluent API support)
	 */
	public function addNagiosServiceTemplateRelatedByNotificationPeriod(NagiosServiceTemplate $l)
	{
		if ($this->collNagiosServiceTemplatesRelatedByNotificationPeriod === null) {
			$this->initNagiosServiceTemplatesRelatedByNotificationPeriod();
		}
		if (!$this->collNagiosServiceTemplatesRelatedByNotificationPeriod->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNagiosServiceTemplateRelatedByNotificationPeriod($l);
		}

		return $this;
	}

	/**
	 * @param	NagiosServiceTemplateRelatedByNotificationPeriod $nagiosServiceTemplateRelatedByNotificationPeriod The nagiosServiceTemplateRelatedByNotificationPeriod object to add.
	 */
	protected function doAddNagiosServiceTemplateRelatedByNotificationPeriod($nagiosServiceTemplateRelatedByNotificationPeriod)
	{
		$this->collNagiosServiceTemplatesRelatedByNotificationPeriod[]= $nagiosServiceTemplateRelatedByNotificationPeriod;
		$nagiosServiceTemplateRelatedByNotificationPeriod->setNagiosTimeperiodRelatedByNotificationPeriod($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosServiceTemplatesRelatedByNotificationPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosServiceTemplate[] List of NagiosServiceTemplate objects
	 */
	public function getNagiosServiceTemplatesRelatedByNotificationPeriodJoinNagiosCommandRelatedByCheckCommand($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosServiceTemplateQuery::create(null, $criteria);
		$query->joinWith('NagiosCommandRelatedByCheckCommand', $join_behavior);

		return $this->getNagiosServiceTemplatesRelatedByNotificationPeriod($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosServiceTemplatesRelatedByNotificationPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosServiceTemplate[] List of NagiosServiceTemplate objects
	 */
	public function getNagiosServiceTemplatesRelatedByNotificationPeriodJoinNagiosCommandRelatedByEventHandler($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosServiceTemplateQuery::create(null, $criteria);
		$query->joinWith('NagiosCommandRelatedByEventHandler', $join_behavior);

		return $this->getNagiosServiceTemplatesRelatedByNotificationPeriod($query, $con);
	}

	/**
	 * Clears out the collNagiosServicesRelatedByCheckPeriod collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNagiosServicesRelatedByCheckPeriod()
	 */
	public function clearNagiosServicesRelatedByCheckPeriod()
	{
		$this->collNagiosServicesRelatedByCheckPeriod = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNagiosServicesRelatedByCheckPeriod collection.
	 *
	 * By default this just sets the collNagiosServicesRelatedByCheckPeriod collection to an empty array (like clearcollNagiosServicesRelatedByCheckPeriod());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNagiosServicesRelatedByCheckPeriod($overrideExisting = true)
	{
		if (null !== $this->collNagiosServicesRelatedByCheckPeriod && !$overrideExisting) {
			return;
		}
		$this->collNagiosServicesRelatedByCheckPeriod = new PropelObjectCollection();
		$this->collNagiosServicesRelatedByCheckPeriod->setModel('NagiosService');
	}

	/**
	 * Gets an array of NagiosService objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this NagiosTimeperiod is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array NagiosService[] List of NagiosService objects
	 * @throws     PropelException
	 */
	public function getNagiosServicesRelatedByCheckPeriod($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNagiosServicesRelatedByCheckPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosServicesRelatedByCheckPeriod) {
				// return empty collection
				$this->initNagiosServicesRelatedByCheckPeriod();
			} else {
				$collNagiosServicesRelatedByCheckPeriod = NagiosServiceQuery::create(null, $criteria)
					->filterByNagiosTimeperiodRelatedByCheckPeriod($this)
					->find($con);
				if (null !== $criteria) {
					return $collNagiosServicesRelatedByCheckPeriod;
				}
				$this->collNagiosServicesRelatedByCheckPeriod = $collNagiosServicesRelatedByCheckPeriod;
			}
		}
		return $this->collNagiosServicesRelatedByCheckPeriod;
	}

	/**
	 * Sets a collection of NagiosServiceRelatedByCheckPeriod objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $nagiosServicesRelatedByCheckPeriod A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNagiosServicesRelatedByCheckPeriod(PropelCollection $nagiosServicesRelatedByCheckPeriod, PropelPDO $con = null)
	{
		$this->nagiosServicesRelatedByCheckPeriodScheduledForDeletion = $this->getNagiosServicesRelatedByCheckPeriod(new Criteria(), $con)->diff($nagiosServicesRelatedByCheckPeriod);

		foreach ($nagiosServicesRelatedByCheckPeriod as $nagiosServiceRelatedByCheckPeriod) {
			// Fix issue with collection modified by reference
			if ($nagiosServiceRelatedByCheckPeriod->isNew()) {
				$nagiosServiceRelatedByCheckPeriod->setNagiosTimeperiodRelatedByCheckPeriod($this);
			}
			$this->addNagiosServiceRelatedByCheckPeriod($nagiosServiceRelatedByCheckPeriod);
		}

		$this->collNagiosServicesRelatedByCheckPeriod = $nagiosServicesRelatedByCheckPeriod;
	}

	/**
	 * Returns the number of related NagiosService objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related NagiosService objects.
	 * @throws     PropelException
	 */
	public function countNagiosServicesRelatedByCheckPeriod(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNagiosServicesRelatedByCheckPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosServicesRelatedByCheckPeriod) {
				return 0;
			} else {
				$query = NagiosServiceQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByNagiosTimeperiodRelatedByCheckPeriod($this)
					->count($con);
			}
		} else {
			return count($this->collNagiosServicesRelatedByCheckPeriod);
		}
	}

	/**
	 * Method called to associate a NagiosService object to this object
	 * through the NagiosService foreign key attribute.
	 *
	 * @param      NagiosService $l NagiosService
	 * @return     NagiosTimeperiod The current object (for fluent API support)
	 */
	public function addNagiosServiceRelatedByCheckPeriod(NagiosService $l)
	{
		if ($this->collNagiosServicesRelatedByCheckPeriod === null) {
			$this->initNagiosServicesRelatedByCheckPeriod();
		}
		if (!$this->collNagiosServicesRelatedByCheckPeriod->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNagiosServiceRelatedByCheckPeriod($l);
		}

		return $this;
	}

	/**
	 * @param	NagiosServiceRelatedByCheckPeriod $nagiosServiceRelatedByCheckPeriod The nagiosServiceRelatedByCheckPeriod object to add.
	 */
	protected function doAddNagiosServiceRelatedByCheckPeriod($nagiosServiceRelatedByCheckPeriod)
	{
		$this->collNagiosServicesRelatedByCheckPeriod[]= $nagiosServiceRelatedByCheckPeriod;
		$nagiosServiceRelatedByCheckPeriod->setNagiosTimeperiodRelatedByCheckPeriod($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosServicesRelatedByCheckPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosService[] List of NagiosService objects
	 */
	public function getNagiosServicesRelatedByCheckPeriodJoinNagiosHost($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosServiceQuery::create(null, $criteria);
		$query->joinWith('NagiosHost', $join_behavior);

		return $this->getNagiosServicesRelatedByCheckPeriod($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosServicesRelatedByCheckPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosService[] List of NagiosService objects
	 */
	public function getNagiosServicesRelatedByCheckPeriodJoinNagiosHostTemplate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosServiceQuery::create(null, $criteria);
		$query->joinWith('NagiosHostTemplate', $join_behavior);

		return $this->getNagiosServicesRelatedByCheckPeriod($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosServicesRelatedByCheckPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosService[] List of NagiosService objects
	 */
	public function getNagiosServicesRelatedByCheckPeriodJoinNagiosHostgroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosServiceQuery::create(null, $criteria);
		$query->joinWith('NagiosHostgroup', $join_behavior);

		return $this->getNagiosServicesRelatedByCheckPeriod($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosServicesRelatedByCheckPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosService[] List of NagiosService objects
	 */
	public function getNagiosServicesRelatedByCheckPeriodJoinNagiosCommandRelatedByCheckCommand($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosServiceQuery::create(null, $criteria);
		$query->joinWith('NagiosCommandRelatedByCheckCommand', $join_behavior);

		return $this->getNagiosServicesRelatedByCheckPeriod($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosServicesRelatedByCheckPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosService[] List of NagiosService objects
	 */
	public function getNagiosServicesRelatedByCheckPeriodJoinNagiosCommandRelatedByEventHandler($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosServiceQuery::create(null, $criteria);
		$query->joinWith('NagiosCommandRelatedByEventHandler', $join_behavior);

		return $this->getNagiosServicesRelatedByCheckPeriod($query, $con);
	}

	/**
	 * Clears out the collNagiosServicesRelatedByNotificationPeriod collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNagiosServicesRelatedByNotificationPeriod()
	 */
	public function clearNagiosServicesRelatedByNotificationPeriod()
	{
		$this->collNagiosServicesRelatedByNotificationPeriod = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNagiosServicesRelatedByNotificationPeriod collection.
	 *
	 * By default this just sets the collNagiosServicesRelatedByNotificationPeriod collection to an empty array (like clearcollNagiosServicesRelatedByNotificationPeriod());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNagiosServicesRelatedByNotificationPeriod($overrideExisting = true)
	{
		if (null !== $this->collNagiosServicesRelatedByNotificationPeriod && !$overrideExisting) {
			return;
		}
		$this->collNagiosServicesRelatedByNotificationPeriod = new PropelObjectCollection();
		$this->collNagiosServicesRelatedByNotificationPeriod->setModel('NagiosService');
	}

	/**
	 * Gets an array of NagiosService objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this NagiosTimeperiod is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array NagiosService[] List of NagiosService objects
	 * @throws     PropelException
	 */
	public function getNagiosServicesRelatedByNotificationPeriod($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNagiosServicesRelatedByNotificationPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosServicesRelatedByNotificationPeriod) {
				// return empty collection
				$this->initNagiosServicesRelatedByNotificationPeriod();
			} else {
				$collNagiosServicesRelatedByNotificationPeriod = NagiosServiceQuery::create(null, $criteria)
					->filterByNagiosTimeperiodRelatedByNotificationPeriod($this)
					->find($con);
				if (null !== $criteria) {
					return $collNagiosServicesRelatedByNotificationPeriod;
				}
				$this->collNagiosServicesRelatedByNotificationPeriod = $collNagiosServicesRelatedByNotificationPeriod;
			}
		}
		return $this->collNagiosServicesRelatedByNotificationPeriod;
	}

	/**
	 * Sets a collection of NagiosServiceRelatedByNotificationPeriod objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $nagiosServicesRelatedByNotificationPeriod A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNagiosServicesRelatedByNotificationPeriod(PropelCollection $nagiosServicesRelatedByNotificationPeriod, PropelPDO $con = null)
	{
		$this->nagiosServicesRelatedByNotificationPeriodScheduledForDeletion = $this->getNagiosServicesRelatedByNotificationPeriod(new Criteria(), $con)->diff($nagiosServicesRelatedByNotificationPeriod);

		foreach ($nagiosServicesRelatedByNotificationPeriod as $nagiosServiceRelatedByNotificationPeriod) {
			// Fix issue with collection modified by reference
			if ($nagiosServiceRelatedByNotificationPeriod->isNew()) {
				$nagiosServiceRelatedByNotificationPeriod->setNagiosTimeperiodRelatedByNotificationPeriod($this);
			}
			$this->addNagiosServiceRelatedByNotificationPeriod($nagiosServiceRelatedByNotificationPeriod);
		}

		$this->collNagiosServicesRelatedByNotificationPeriod = $nagiosServicesRelatedByNotificationPeriod;
	}

	/**
	 * Returns the number of related NagiosService objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related NagiosService objects.
	 * @throws     PropelException
	 */
	public function countNagiosServicesRelatedByNotificationPeriod(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNagiosServicesRelatedByNotificationPeriod || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosServicesRelatedByNotificationPeriod) {
				return 0;
			} else {
				$query = NagiosServiceQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByNagiosTimeperiodRelatedByNotificationPeriod($this)
					->count($con);
			}
		} else {
			return count($this->collNagiosServicesRelatedByNotificationPeriod);
		}
	}

	/**
	 * Method called to associate a NagiosService object to this object
	 * through the NagiosService foreign key attribute.
	 *
	 * @param      NagiosService $l NagiosService
	 * @return     NagiosTimeperiod The current object (for fluent API support)
	 */
	public function addNagiosServiceRelatedByNotificationPeriod(NagiosService $l)
	{
		if ($this->collNagiosServicesRelatedByNotificationPeriod === null) {
			$this->initNagiosServicesRelatedByNotificationPeriod();
		}
		if (!$this->collNagiosServicesRelatedByNotificationPeriod->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNagiosServiceRelatedByNotificationPeriod($l);
		}

		return $this;
	}

	/**
	 * @param	NagiosServiceRelatedByNotificationPeriod $nagiosServiceRelatedByNotificationPeriod The nagiosServiceRelatedByNotificationPeriod object to add.
	 */
	protected function doAddNagiosServiceRelatedByNotificationPeriod($nagiosServiceRelatedByNotificationPeriod)
	{
		$this->collNagiosServicesRelatedByNotificationPeriod[]= $nagiosServiceRelatedByNotificationPeriod;
		$nagiosServiceRelatedByNotificationPeriod->setNagiosTimeperiodRelatedByNotificationPeriod($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosServicesRelatedByNotificationPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosService[] List of NagiosService objects
	 */
	public function getNagiosServicesRelatedByNotificationPeriodJoinNagiosHost($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosServiceQuery::create(null, $criteria);
		$query->joinWith('NagiosHost', $join_behavior);

		return $this->getNagiosServicesRelatedByNotificationPeriod($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosServicesRelatedByNotificationPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosService[] List of NagiosService objects
	 */
	public function getNagiosServicesRelatedByNotificationPeriodJoinNagiosHostTemplate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosServiceQuery::create(null, $criteria);
		$query->joinWith('NagiosHostTemplate', $join_behavior);

		return $this->getNagiosServicesRelatedByNotificationPeriod($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosServicesRelatedByNotificationPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosService[] List of NagiosService objects
	 */
	public function getNagiosServicesRelatedByNotificationPeriodJoinNagiosHostgroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosServiceQuery::create(null, $criteria);
		$query->joinWith('NagiosHostgroup', $join_behavior);

		return $this->getNagiosServicesRelatedByNotificationPeriod($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosServicesRelatedByNotificationPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosService[] List of NagiosService objects
	 */
	public function getNagiosServicesRelatedByNotificationPeriodJoinNagiosCommandRelatedByCheckCommand($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosServiceQuery::create(null, $criteria);
		$query->joinWith('NagiosCommandRelatedByCheckCommand', $join_behavior);

		return $this->getNagiosServicesRelatedByNotificationPeriod($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosServicesRelatedByNotificationPeriod from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosService[] List of NagiosService objects
	 */
	public function getNagiosServicesRelatedByNotificationPeriodJoinNagiosCommandRelatedByEventHandler($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosServiceQuery::create(null, $criteria);
		$query->joinWith('NagiosCommandRelatedByEventHandler', $join_behavior);

		return $this->getNagiosServicesRelatedByNotificationPeriod($query, $con);
	}

	/**
	 * Clears out the collNagiosDependencys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNagiosDependencys()
	 */
	public function clearNagiosDependencys()
	{
		$this->collNagiosDependencys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNagiosDependencys collection.
	 *
	 * By default this just sets the collNagiosDependencys collection to an empty array (like clearcollNagiosDependencys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNagiosDependencys($overrideExisting = true)
	{
		if (null !== $this->collNagiosDependencys && !$overrideExisting) {
			return;
		}
		$this->collNagiosDependencys = new PropelObjectCollection();
		$this->collNagiosDependencys->setModel('NagiosDependency');
	}

	/**
	 * Gets an array of NagiosDependency objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this NagiosTimeperiod is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array NagiosDependency[] List of NagiosDependency objects
	 * @throws     PropelException
	 */
	public function getNagiosDependencys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNagiosDependencys || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosDependencys) {
				// return empty collection
				$this->initNagiosDependencys();
			} else {
				$collNagiosDependencys = NagiosDependencyQuery::create(null, $criteria)
					->filterByNagiosTimeperiod($this)
					->find($con);
				if (null !== $criteria) {
					return $collNagiosDependencys;
				}
				$this->collNagiosDependencys = $collNagiosDependencys;
			}
		}
		return $this->collNagiosDependencys;
	}

	/**
	 * Sets a collection of NagiosDependency objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $nagiosDependencys A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNagiosDependencys(PropelCollection $nagiosDependencys, PropelPDO $con = null)
	{
		$this->nagiosDependencysScheduledForDeletion = $this->getNagiosDependencys(new Criteria(), $con)->diff($nagiosDependencys);

		foreach ($nagiosDependencys as $nagiosDependency) {
			// Fix issue with collection modified by reference
			if ($nagiosDependency->isNew()) {
				$nagiosDependency->setNagiosTimeperiod($this);
			}
			$this->addNagiosDependency($nagiosDependency);
		}

		$this->collNagiosDependencys = $nagiosDependencys;
	}

	/**
	 * Returns the number of related NagiosDependency objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related NagiosDependency objects.
	 * @throws     PropelException
	 */
	public function countNagiosDependencys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNagiosDependencys || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosDependencys) {
				return 0;
			} else {
				$query = NagiosDependencyQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByNagiosTimeperiod($this)
					->count($con);
			}
		} else {
			return count($this->collNagiosDependencys);
		}
	}

	/**
	 * Method called to associate a NagiosDependency object to this object
	 * through the NagiosDependency foreign key attribute.
	 *
	 * @param      NagiosDependency $l NagiosDependency
	 * @return     NagiosTimeperiod The current object (for fluent API support)
	 */
	public function addNagiosDependency(NagiosDependency $l)
	{
		if ($this->collNagiosDependencys === null) {
			$this->initNagiosDependencys();
		}
		if (!$this->collNagiosDependencys->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNagiosDependency($l);
		}

		return $this;
	}

	/**
	 * @param	NagiosDependency $nagiosDependency The nagiosDependency object to add.
	 */
	protected function doAddNagiosDependency($nagiosDependency)
	{
		$this->collNagiosDependencys[]= $nagiosDependency;
		$nagiosDependency->setNagiosTimeperiod($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosDependencys from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosDependency[] List of NagiosDependency objects
	 */
	public function getNagiosDependencysJoinNagiosHostTemplate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosDependencyQuery::create(null, $criteria);
		$query->joinWith('NagiosHostTemplate', $join_behavior);

		return $this->getNagiosDependencys($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosDependencys from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosDependency[] List of NagiosDependency objects
	 */
	public function getNagiosDependencysJoinNagiosHost($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosDependencyQuery::create(null, $criteria);
		$query->joinWith('NagiosHost', $join_behavior);

		return $this->getNagiosDependencys($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosDependencys from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosDependency[] List of NagiosDependency objects
	 */
	public function getNagiosDependencysJoinNagiosServiceTemplate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosDependencyQuery::create(null, $criteria);
		$query->joinWith('NagiosServiceTemplate', $join_behavior);

		return $this->getNagiosDependencys($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosDependencys from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosDependency[] List of NagiosDependency objects
	 */
	public function getNagiosDependencysJoinNagiosService($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosDependencyQuery::create(null, $criteria);
		$query->joinWith('NagiosService', $join_behavior);

		return $this->getNagiosDependencys($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosDependencys from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosDependency[] List of NagiosDependency objects
	 */
	public function getNagiosDependencysJoinNagiosHostgroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosDependencyQuery::create(null, $criteria);
		$query->joinWith('NagiosHostgroup', $join_behavior);

		return $this->getNagiosDependencys($query, $con);
	}

	/**
	 * Clears out the collNagiosEscalations collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNagiosEscalations()
	 */
	public function clearNagiosEscalations()
	{
		$this->collNagiosEscalations = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNagiosEscalations collection.
	 *
	 * By default this just sets the collNagiosEscalations collection to an empty array (like clearcollNagiosEscalations());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNagiosEscalations($overrideExisting = true)
	{
		if (null !== $this->collNagiosEscalations && !$overrideExisting) {
			return;
		}
		$this->collNagiosEscalations = new PropelObjectCollection();
		$this->collNagiosEscalations->setModel('NagiosEscalation');
	}

	/**
	 * Gets an array of NagiosEscalation objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this NagiosTimeperiod is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array NagiosEscalation[] List of NagiosEscalation objects
	 * @throws     PropelException
	 */
	public function getNagiosEscalations($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNagiosEscalations || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosEscalations) {
				// return empty collection
				$this->initNagiosEscalations();
			} else {
				$collNagiosEscalations = NagiosEscalationQuery::create(null, $criteria)
					->filterByNagiosTimeperiod($this)
					->find($con);
				if (null !== $criteria) {
					return $collNagiosEscalations;
				}
				$this->collNagiosEscalations = $collNagiosEscalations;
			}
		}
		return $this->collNagiosEscalations;
	}

	/**
	 * Sets a collection of NagiosEscalation objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $nagiosEscalations A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNagiosEscalations(PropelCollection $nagiosEscalations, PropelPDO $con = null)
	{
		$this->nagiosEscalationsScheduledForDeletion = $this->getNagiosEscalations(new Criteria(), $con)->diff($nagiosEscalations);

		foreach ($nagiosEscalations as $nagiosEscalation) {
			// Fix issue with collection modified by reference
			if ($nagiosEscalation->isNew()) {
				$nagiosEscalation->setNagiosTimeperiod($this);
			}
			$this->addNagiosEscalation($nagiosEscalation);
		}

		$this->collNagiosEscalations = $nagiosEscalations;
	}

	/**
	 * Returns the number of related NagiosEscalation objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related NagiosEscalation objects.
	 * @throws     PropelException
	 */
	public function countNagiosEscalations(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNagiosEscalations || null !== $criteria) {
			if ($this->isNew() && null === $this->collNagiosEscalations) {
				return 0;
			} else {
				$query = NagiosEscalationQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByNagiosTimeperiod($this)
					->count($con);
			}
		} else {
			return count($this->collNagiosEscalations);
		}
	}

	/**
	 * Method called to associate a NagiosEscalation object to this object
	 * through the NagiosEscalation foreign key attribute.
	 *
	 * @param      NagiosEscalation $l NagiosEscalation
	 * @return     NagiosTimeperiod The current object (for fluent API support)
	 */
	public function addNagiosEscalation(NagiosEscalation $l)
	{
		if ($this->collNagiosEscalations === null) {
			$this->initNagiosEscalations();
		}
		if (!$this->collNagiosEscalations->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNagiosEscalation($l);
		}

		return $this;
	}

	/**
	 * @param	NagiosEscalation $nagiosEscalation The nagiosEscalation object to add.
	 */
	protected function doAddNagiosEscalation($nagiosEscalation)
	{
		$this->collNagiosEscalations[]= $nagiosEscalation;
		$nagiosEscalation->setNagiosTimeperiod($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosEscalations from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosEscalation[] List of NagiosEscalation objects
	 */
	public function getNagiosEscalationsJoinNagiosHostTemplate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosEscalationQuery::create(null, $criteria);
		$query->joinWith('NagiosHostTemplate', $join_behavior);

		return $this->getNagiosEscalations($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosEscalations from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosEscalation[] List of NagiosEscalation objects
	 */
	public function getNagiosEscalationsJoinNagiosHost($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosEscalationQuery::create(null, $criteria);
		$query->joinWith('NagiosHost', $join_behavior);

		return $this->getNagiosEscalations($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosEscalations from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosEscalation[] List of NagiosEscalation objects
	 */
	public function getNagiosEscalationsJoinNagiosServiceTemplate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosEscalationQuery::create(null, $criteria);
		$query->joinWith('NagiosServiceTemplate', $join_behavior);

		return $this->getNagiosEscalations($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosEscalations from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosEscalation[] List of NagiosEscalation objects
	 */
	public function getNagiosEscalationsJoinNagiosService($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosEscalationQuery::create(null, $criteria);
		$query->joinWith('NagiosService', $join_behavior);

		return $this->getNagiosEscalations($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this NagiosTimeperiod is new, it will return
	 * an empty collection; or if this NagiosTimeperiod has previously
	 * been saved, it will retrieve related NagiosEscalations from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in NagiosTimeperiod.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NagiosEscalation[] List of NagiosEscalation objects
	 */
	public function getNagiosEscalationsJoinNagiosHostgroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NagiosEscalationQuery::create(null, $criteria);
		$query->joinWith('NagiosHostgroup', $join_behavior);

		return $this->getNagiosEscalations($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->name = null;
		$this->alias = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collNagiosTimeperiodEntrys) {
				foreach ($this->collNagiosTimeperiodEntrys as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNagiosTimeperiodExcludesRelatedByTimeperiodId) {
				foreach ($this->collNagiosTimeperiodExcludesRelatedByTimeperiodId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod) {
				foreach ($this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNagiosContactsRelatedByHostNotificationPeriod) {
				foreach ($this->collNagiosContactsRelatedByHostNotificationPeriod as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNagiosContactsRelatedByServiceNotificationPeriod) {
				foreach ($this->collNagiosContactsRelatedByServiceNotificationPeriod as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNagiosHostTemplatesRelatedByCheckPeriod) {
				foreach ($this->collNagiosHostTemplatesRelatedByCheckPeriod as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNagiosHostTemplatesRelatedByNotificationPeriod) {
				foreach ($this->collNagiosHostTemplatesRelatedByNotificationPeriod as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNagiosHostsRelatedByCheckPeriod) {
				foreach ($this->collNagiosHostsRelatedByCheckPeriod as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNagiosHostsRelatedByNotificationPeriod) {
				foreach ($this->collNagiosHostsRelatedByNotificationPeriod as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNagiosServiceTemplatesRelatedByCheckPeriod) {
				foreach ($this->collNagiosServiceTemplatesRelatedByCheckPeriod as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNagiosServiceTemplatesRelatedByNotificationPeriod) {
				foreach ($this->collNagiosServiceTemplatesRelatedByNotificationPeriod as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNagiosServicesRelatedByCheckPeriod) {
				foreach ($this->collNagiosServicesRelatedByCheckPeriod as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNagiosServicesRelatedByNotificationPeriod) {
				foreach ($this->collNagiosServicesRelatedByNotificationPeriod as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNagiosDependencys) {
				foreach ($this->collNagiosDependencys as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNagiosEscalations) {
				foreach ($this->collNagiosEscalations as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collNagiosTimeperiodEntrys instanceof PropelCollection) {
			$this->collNagiosTimeperiodEntrys->clearIterator();
		}
		$this->collNagiosTimeperiodEntrys = null;
		if ($this->collNagiosTimeperiodExcludesRelatedByTimeperiodId instanceof PropelCollection) {
			$this->collNagiosTimeperiodExcludesRelatedByTimeperiodId->clearIterator();
		}
		$this->collNagiosTimeperiodExcludesRelatedByTimeperiodId = null;
		if ($this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod instanceof PropelCollection) {
			$this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod->clearIterator();
		}
		$this->collNagiosTimeperiodExcludesRelatedByExcludedTimeperiod = null;
		if ($this->collNagiosContactsRelatedByHostNotificationPeriod instanceof PropelCollection) {
			$this->collNagiosContactsRelatedByHostNotificationPeriod->clearIterator();
		}
		$this->collNagiosContactsRelatedByHostNotificationPeriod = null;
		if ($this->collNagiosContactsRelatedByServiceNotificationPeriod instanceof PropelCollection) {
			$this->collNagiosContactsRelatedByServiceNotificationPeriod->clearIterator();
		}
		$this->collNagiosContactsRelatedByServiceNotificationPeriod = null;
		if ($this->collNagiosHostTemplatesRelatedByCheckPeriod instanceof PropelCollection) {
			$this->collNagiosHostTemplatesRelatedByCheckPeriod->clearIterator();
		}
		$this->collNagiosHostTemplatesRelatedByCheckPeriod = null;
		if ($this->collNagiosHostTemplatesRelatedByNotificationPeriod instanceof PropelCollection) {
			$this->collNagiosHostTemplatesRelatedByNotificationPeriod->clearIterator();
		}
		$this->collNagiosHostTemplatesRelatedByNotificationPeriod = null;
		if ($this->collNagiosHostsRelatedByCheckPeriod instanceof PropelCollection) {
			$this->collNagiosHostsRelatedByCheckPeriod->clearIterator();
		}
		$this->collNagiosHostsRelatedByCheckPeriod = null;
		if ($this->collNagiosHostsRelatedByNotificationPeriod instanceof PropelCollection) {
			$this->collNagiosHostsRelatedByNotificationPeriod->clearIterator();
		}
		$this->collNagiosHostsRelatedByNotificationPeriod = null;
		if ($this->collNagiosServiceTemplatesRelatedByCheckPeriod instanceof PropelCollection) {
			$this->collNagiosServiceTemplatesRelatedByCheckPeriod->clearIterator();
		}
		$this->collNagiosServiceTemplatesRelatedByCheckPeriod = null;
		if ($this->collNagiosServiceTemplatesRelatedByNotificationPeriod instanceof PropelCollection) {
			$this->collNagiosServiceTemplatesRelatedByNotificationPeriod->clearIterator();
		}
		$this->collNagiosServiceTemplatesRelatedByNotificationPeriod = null;
		if ($this->collNagiosServicesRelatedByCheckPeriod instanceof PropelCollection) {
			$this->collNagiosServicesRelatedByCheckPeriod->clearIterator();
		}
		$this->collNagiosServicesRelatedByCheckPeriod = null;
		if ($this->collNagiosServicesRelatedByNotificationPeriod instanceof PropelCollection) {
			$this->collNagiosServicesRelatedByNotificationPeriod->clearIterator();
		}
		$this->collNagiosServicesRelatedByNotificationPeriod = null;
		if ($this->collNagiosDependencys instanceof PropelCollection) {
			$this->collNagiosDependencys->clearIterator();
		}
		$this->collNagiosDependencys = null;
		if ($this->collNagiosEscalations instanceof PropelCollection) {
			$this->collNagiosEscalations->clearIterator();
		}
		$this->collNagiosEscalations = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(NagiosTimeperiodPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseNagiosTimeperiod
