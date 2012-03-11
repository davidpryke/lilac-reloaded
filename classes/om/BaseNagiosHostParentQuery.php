<?php


/**
 * Base class that represents a query for the 'nagios_host_parent' table.
 *
 * Nagios Additional Host Parent Relationship
 *
 * @method     NagiosHostParentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     NagiosHostParentQuery orderByChildHost($order = Criteria::ASC) Order by the child_host column
 * @method     NagiosHostParentQuery orderByChildHostTemplate($order = Criteria::ASC) Order by the child_host_template column
 * @method     NagiosHostParentQuery orderByParentHost($order = Criteria::ASC) Order by the parent_host column
 *
 * @method     NagiosHostParentQuery groupById() Group by the id column
 * @method     NagiosHostParentQuery groupByChildHost() Group by the child_host column
 * @method     NagiosHostParentQuery groupByChildHostTemplate() Group by the child_host_template column
 * @method     NagiosHostParentQuery groupByParentHost() Group by the parent_host column
 *
 * @method     NagiosHostParentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     NagiosHostParentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     NagiosHostParentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     NagiosHostParentQuery leftJoinNagiosHostRelatedByChildHost($relationAlias = null) Adds a LEFT JOIN clause to the query using the NagiosHostRelatedByChildHost relation
 * @method     NagiosHostParentQuery rightJoinNagiosHostRelatedByChildHost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NagiosHostRelatedByChildHost relation
 * @method     NagiosHostParentQuery innerJoinNagiosHostRelatedByChildHost($relationAlias = null) Adds a INNER JOIN clause to the query using the NagiosHostRelatedByChildHost relation
 *
 * @method     NagiosHostParentQuery leftJoinNagiosHostRelatedByParentHost($relationAlias = null) Adds a LEFT JOIN clause to the query using the NagiosHostRelatedByParentHost relation
 * @method     NagiosHostParentQuery rightJoinNagiosHostRelatedByParentHost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NagiosHostRelatedByParentHost relation
 * @method     NagiosHostParentQuery innerJoinNagiosHostRelatedByParentHost($relationAlias = null) Adds a INNER JOIN clause to the query using the NagiosHostRelatedByParentHost relation
 *
 * @method     NagiosHostParentQuery leftJoinNagiosHostTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the NagiosHostTemplate relation
 * @method     NagiosHostParentQuery rightJoinNagiosHostTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NagiosHostTemplate relation
 * @method     NagiosHostParentQuery innerJoinNagiosHostTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the NagiosHostTemplate relation
 *
 * @method     NagiosHostParent findOne(PropelPDO $con = null) Return the first NagiosHostParent matching the query
 * @method     NagiosHostParent findOneOrCreate(PropelPDO $con = null) Return the first NagiosHostParent matching the query, or a new NagiosHostParent object populated from the query conditions when no match is found
 *
 * @method     NagiosHostParent findOneById(int $id) Return the first NagiosHostParent filtered by the id column
 * @method     NagiosHostParent findOneByChildHost(int $child_host) Return the first NagiosHostParent filtered by the child_host column
 * @method     NagiosHostParent findOneByChildHostTemplate(int $child_host_template) Return the first NagiosHostParent filtered by the child_host_template column
 * @method     NagiosHostParent findOneByParentHost(int $parent_host) Return the first NagiosHostParent filtered by the parent_host column
 *
 * @method     array findById(int $id) Return NagiosHostParent objects filtered by the id column
 * @method     array findByChildHost(int $child_host) Return NagiosHostParent objects filtered by the child_host column
 * @method     array findByChildHostTemplate(int $child_host_template) Return NagiosHostParent objects filtered by the child_host_template column
 * @method     array findByParentHost(int $parent_host) Return NagiosHostParent objects filtered by the parent_host column
 *
 * @package    propel.generator..om
 */
abstract class BaseNagiosHostParentQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseNagiosHostParentQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'lilac', $modelName = 'NagiosHostParent', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new NagiosHostParentQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    NagiosHostParentQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof NagiosHostParentQuery) {
			return $criteria;
		}
		$query = new NagiosHostParentQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    NagiosHostParent|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = NagiosHostParentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(NagiosHostParentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    NagiosHostParent A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `CHILD_HOST`, `CHILD_HOST_TEMPLATE`, `PARENT_HOST` FROM `nagios_host_parent` WHERE `ID` = :p0';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key, PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new NagiosHostParent();
			$obj->hydrate($row);
			NagiosHostParentPeer::addInstanceToPool($obj, (string) $row[0]);
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    NagiosHostParent|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    NagiosHostParentQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(NagiosHostParentPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    NagiosHostParentQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(NagiosHostParentPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NagiosHostParentQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(NagiosHostParentPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the child_host column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByChildHost(1234); // WHERE child_host = 1234
	 * $query->filterByChildHost(array(12, 34)); // WHERE child_host IN (12, 34)
	 * $query->filterByChildHost(array('min' => 12)); // WHERE child_host > 12
	 * </code>
	 *
	 * @see       filterByNagiosHostRelatedByChildHost()
	 *
	 * @param     mixed $childHost The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NagiosHostParentQuery The current query, for fluid interface
	 */
	public function filterByChildHost($childHost = null, $comparison = null)
	{
		if (is_array($childHost)) {
			$useMinMax = false;
			if (isset($childHost['min'])) {
				$this->addUsingAlias(NagiosHostParentPeer::CHILD_HOST, $childHost['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($childHost['max'])) {
				$this->addUsingAlias(NagiosHostParentPeer::CHILD_HOST, $childHost['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NagiosHostParentPeer::CHILD_HOST, $childHost, $comparison);
	}

	/**
	 * Filter the query on the child_host_template column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByChildHostTemplate(1234); // WHERE child_host_template = 1234
	 * $query->filterByChildHostTemplate(array(12, 34)); // WHERE child_host_template IN (12, 34)
	 * $query->filterByChildHostTemplate(array('min' => 12)); // WHERE child_host_template > 12
	 * </code>
	 *
	 * @see       filterByNagiosHostTemplate()
	 *
	 * @param     mixed $childHostTemplate The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NagiosHostParentQuery The current query, for fluid interface
	 */
	public function filterByChildHostTemplate($childHostTemplate = null, $comparison = null)
	{
		if (is_array($childHostTemplate)) {
			$useMinMax = false;
			if (isset($childHostTemplate['min'])) {
				$this->addUsingAlias(NagiosHostParentPeer::CHILD_HOST_TEMPLATE, $childHostTemplate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($childHostTemplate['max'])) {
				$this->addUsingAlias(NagiosHostParentPeer::CHILD_HOST_TEMPLATE, $childHostTemplate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NagiosHostParentPeer::CHILD_HOST_TEMPLATE, $childHostTemplate, $comparison);
	}

	/**
	 * Filter the query on the parent_host column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByParentHost(1234); // WHERE parent_host = 1234
	 * $query->filterByParentHost(array(12, 34)); // WHERE parent_host IN (12, 34)
	 * $query->filterByParentHost(array('min' => 12)); // WHERE parent_host > 12
	 * </code>
	 *
	 * @see       filterByNagiosHostRelatedByParentHost()
	 *
	 * @param     mixed $parentHost The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NagiosHostParentQuery The current query, for fluid interface
	 */
	public function filterByParentHost($parentHost = null, $comparison = null)
	{
		if (is_array($parentHost)) {
			$useMinMax = false;
			if (isset($parentHost['min'])) {
				$this->addUsingAlias(NagiosHostParentPeer::PARENT_HOST, $parentHost['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($parentHost['max'])) {
				$this->addUsingAlias(NagiosHostParentPeer::PARENT_HOST, $parentHost['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NagiosHostParentPeer::PARENT_HOST, $parentHost, $comparison);
	}

	/**
	 * Filter the query by a related NagiosHost object
	 *
	 * @param     NagiosHost|PropelCollection $nagiosHost The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NagiosHostParentQuery The current query, for fluid interface
	 */
	public function filterByNagiosHostRelatedByChildHost($nagiosHost, $comparison = null)
	{
		if ($nagiosHost instanceof NagiosHost) {
			return $this
				->addUsingAlias(NagiosHostParentPeer::CHILD_HOST, $nagiosHost->getId(), $comparison);
		} elseif ($nagiosHost instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(NagiosHostParentPeer::CHILD_HOST, $nagiosHost->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByNagiosHostRelatedByChildHost() only accepts arguments of type NagiosHost or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the NagiosHostRelatedByChildHost relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NagiosHostParentQuery The current query, for fluid interface
	 */
	public function joinNagiosHostRelatedByChildHost($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('NagiosHostRelatedByChildHost');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'NagiosHostRelatedByChildHost');
		}

		return $this;
	}

	/**
	 * Use the NagiosHostRelatedByChildHost relation NagiosHost object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NagiosHostQuery A secondary query class using the current class as primary query
	 */
	public function useNagiosHostRelatedByChildHostQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinNagiosHostRelatedByChildHost($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'NagiosHostRelatedByChildHost', 'NagiosHostQuery');
	}

	/**
	 * Filter the query by a related NagiosHost object
	 *
	 * @param     NagiosHost|PropelCollection $nagiosHost The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NagiosHostParentQuery The current query, for fluid interface
	 */
	public function filterByNagiosHostRelatedByParentHost($nagiosHost, $comparison = null)
	{
		if ($nagiosHost instanceof NagiosHost) {
			return $this
				->addUsingAlias(NagiosHostParentPeer::PARENT_HOST, $nagiosHost->getId(), $comparison);
		} elseif ($nagiosHost instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(NagiosHostParentPeer::PARENT_HOST, $nagiosHost->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByNagiosHostRelatedByParentHost() only accepts arguments of type NagiosHost or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the NagiosHostRelatedByParentHost relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NagiosHostParentQuery The current query, for fluid interface
	 */
	public function joinNagiosHostRelatedByParentHost($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('NagiosHostRelatedByParentHost');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'NagiosHostRelatedByParentHost');
		}

		return $this;
	}

	/**
	 * Use the NagiosHostRelatedByParentHost relation NagiosHost object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NagiosHostQuery A secondary query class using the current class as primary query
	 */
	public function useNagiosHostRelatedByParentHostQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinNagiosHostRelatedByParentHost($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'NagiosHostRelatedByParentHost', 'NagiosHostQuery');
	}

	/**
	 * Filter the query by a related NagiosHostTemplate object
	 *
	 * @param     NagiosHostTemplate|PropelCollection $nagiosHostTemplate The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NagiosHostParentQuery The current query, for fluid interface
	 */
	public function filterByNagiosHostTemplate($nagiosHostTemplate, $comparison = null)
	{
		if ($nagiosHostTemplate instanceof NagiosHostTemplate) {
			return $this
				->addUsingAlias(NagiosHostParentPeer::CHILD_HOST_TEMPLATE, $nagiosHostTemplate->getId(), $comparison);
		} elseif ($nagiosHostTemplate instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(NagiosHostParentPeer::CHILD_HOST_TEMPLATE, $nagiosHostTemplate->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByNagiosHostTemplate() only accepts arguments of type NagiosHostTemplate or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the NagiosHostTemplate relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NagiosHostParentQuery The current query, for fluid interface
	 */
	public function joinNagiosHostTemplate($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('NagiosHostTemplate');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'NagiosHostTemplate');
		}

		return $this;
	}

	/**
	 * Use the NagiosHostTemplate relation NagiosHostTemplate object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NagiosHostTemplateQuery A secondary query class using the current class as primary query
	 */
	public function useNagiosHostTemplateQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinNagiosHostTemplate($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'NagiosHostTemplate', 'NagiosHostTemplateQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     NagiosHostParent $nagiosHostParent Object to remove from the list of results
	 *
	 * @return    NagiosHostParentQuery The current query, for fluid interface
	 */
	public function prune($nagiosHostParent = null)
	{
		if ($nagiosHostParent) {
			$this->addUsingAlias(NagiosHostParentPeer::ID, $nagiosHostParent->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseNagiosHostParentQuery