<?php



/**
 * This class defines the structure of the 'nagios_timeperiod' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator..map
 */
class NagiosTimeperiodTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = '.map.NagiosTimeperiodTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
		// attributes
		$this->setName('nagios_timeperiod');
		$this->setPhpName('NagiosTimeperiod');
		$this->setClassname('NagiosTimeperiod');
		$this->setPackage('');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('ALIAS', 'Alias', 'VARCHAR', true, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('NagiosTimeperiodEntry', 'NagiosTimeperiodEntry', RelationMap::ONE_TO_MANY, array('id' => 'timeperiod_id', ), 'SET NULL', null, 'NagiosTimeperiodEntrys');
		$this->addRelation('NagiosTimeperiodExcludeRelatedByTimeperiodId', 'NagiosTimeperiodExclude', RelationMap::ONE_TO_MANY, array('id' => 'timeperiod_id', ), 'SET NULL', null, 'NagiosTimeperiodExcludesRelatedByTimeperiodId');
		$this->addRelation('NagiosTimeperiodExcludeRelatedByExcludedTimeperiod', 'NagiosTimeperiodExclude', RelationMap::ONE_TO_MANY, array('id' => 'excluded_timeperiod', ), 'SET NULL', null, 'NagiosTimeperiodExcludesRelatedByExcludedTimeperiod');
		$this->addRelation('NagiosContactRelatedByHostNotificationPeriod', 'NagiosContact', RelationMap::ONE_TO_MANY, array('id' => 'host_notification_period', ), 'SET NULL', null, 'NagiosContactsRelatedByHostNotificationPeriod');
		$this->addRelation('NagiosContactRelatedByServiceNotificationPeriod', 'NagiosContact', RelationMap::ONE_TO_MANY, array('id' => 'service_notification_period', ), 'SET NULL', null, 'NagiosContactsRelatedByServiceNotificationPeriod');
		$this->addRelation('NagiosHostTemplateRelatedByCheckPeriod', 'NagiosHostTemplate', RelationMap::ONE_TO_MANY, array('id' => 'check_period', ), 'SET NULL', null, 'NagiosHostTemplatesRelatedByCheckPeriod');
		$this->addRelation('NagiosHostTemplateRelatedByNotificationPeriod', 'NagiosHostTemplate', RelationMap::ONE_TO_MANY, array('id' => 'notification_period', ), 'SET NULL', null, 'NagiosHostTemplatesRelatedByNotificationPeriod');
		$this->addRelation('NagiosHostRelatedByCheckPeriod', 'NagiosHost', RelationMap::ONE_TO_MANY, array('id' => 'check_period', ), 'SET NULL', null, 'NagiosHostsRelatedByCheckPeriod');
		$this->addRelation('NagiosHostRelatedByNotificationPeriod', 'NagiosHost', RelationMap::ONE_TO_MANY, array('id' => 'notification_period', ), 'SET NULL', null, 'NagiosHostsRelatedByNotificationPeriod');
		$this->addRelation('NagiosServiceTemplateRelatedByCheckPeriod', 'NagiosServiceTemplate', RelationMap::ONE_TO_MANY, array('id' => 'check_period', ), 'SET NULL', null, 'NagiosServiceTemplatesRelatedByCheckPeriod');
		$this->addRelation('NagiosServiceTemplateRelatedByNotificationPeriod', 'NagiosServiceTemplate', RelationMap::ONE_TO_MANY, array('id' => 'notification_period', ), 'SET NULL', null, 'NagiosServiceTemplatesRelatedByNotificationPeriod');
		$this->addRelation('NagiosServiceRelatedByCheckPeriod', 'NagiosService', RelationMap::ONE_TO_MANY, array('id' => 'check_period', ), 'SET NULL', null, 'NagiosServicesRelatedByCheckPeriod');
		$this->addRelation('NagiosServiceRelatedByNotificationPeriod', 'NagiosService', RelationMap::ONE_TO_MANY, array('id' => 'notification_period', ), 'SET NULL', null, 'NagiosServicesRelatedByNotificationPeriod');
		$this->addRelation('NagiosDependency', 'NagiosDependency', RelationMap::ONE_TO_MANY, array('id' => 'dependency_period', ), 'CASCADE', null, 'NagiosDependencys');
		$this->addRelation('NagiosEscalation', 'NagiosEscalation', RelationMap::ONE_TO_MANY, array('id' => 'escalation_period', ), 'SET NULL', null, 'NagiosEscalations');
	} // buildRelations()

} // NagiosTimeperiodTableMap
