<?php


/**
 * Base class that represents a query for the 'nagios_host_check_command_parameter' table.
 *
 * Parameter for Host Check Command
 *
 * @method     NagiosHostCheckCommandParameterQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     NagiosHostCheckCommandParameterQuery orderByHost($order = Criteria::ASC) Order by the host column
 * @method     NagiosHostCheckCommandParameterQuery orderByHostTemplate($order = Criteria::ASC) Order by the host_template column
 * @method     NagiosHostCheckCommandParameterQuery orderByParameter($order = Criteria::ASC) Order by the parameter column
 *
 * @method     NagiosHostCheckCommandParameterQuery groupById() Group by the id column
 * @method     NagiosHostCheckCommandParameterQuery groupByHost() Group by the host column
 * @method     NagiosHostCheckCommandParameterQuery groupByHostTemplate() Group by the host_template column
 * @method     NagiosHostCheckCommandParameterQuery groupByParameter() Group by the parameter column
 *
 * @method     NagiosHostCheckCommandParameterQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     NagiosHostCheckCommandParameterQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     NagiosHostCheckCommandParameterQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     NagiosHostCheckCommandParameterQuery leftJoinNagiosHost($relationAlias = null) Adds a LEFT JOIN clause to the query using the NagiosHost relation
 * @method     NagiosHostCheckCommandParameterQuery rightJoinNagiosHost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NagiosHost relation
 * @method     NagiosHostCheckCommandParameterQuery innerJoinNagiosHost($relationAlias = null) Adds a INNER JOIN clause to the query using the NagiosHost relation
 *
 * @method     NagiosHostCheckCommandParameterQuery leftJoinNagiosHostTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the NagiosHostTemplate relation
 * @method     NagiosHostCheckCommandParameterQuery rightJoinNagiosHostTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NagiosHostTemplate relation
 * @method     NagiosHostCheckCommandParameterQuery innerJoinNagiosHostTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the NagiosHostTemplate relation
 *
 * @method     NagiosHostCheckCommandParameter findOne(PropelPDO $con = null) Return the first NagiosHostCheckCommandParameter matching the query
 * @method     NagiosHostCheckCommandParameter findOneOrCreate(PropelPDO $con = null) Return the first NagiosHostCheckCommandParameter matching the query, or a new NagiosHostCheckCommandParameter object populated from the query conditions when no match is found
 *
 * @method     NagiosHostCheckCommandParameter findOneById(int $id) Return the first NagiosHostCheckCommandParameter filtered by the id column
 * @method     NagiosHostCheckCommandParameter findOneByHost(int $host) Return the first NagiosHostCheckCommandParameter filtered by the host column
 * @method     NagiosHostCheckCommandParameter findOneByHostTemplate(int $host_template) Return the first NagiosHostCheckCommandParameter filtered by the host_template column
 * @method     NagiosHostCheckCommandParameter findOneByParameter(string $parameter) Return the first NagiosHostCheckCommandParameter filtered by the parameter column
 *
 * @method     array findById(int $id) Return NagiosHostCheckCommandParameter objects filtered by the id column
 * @method     array findByHost(int $host) Return NagiosHostCheckCommandParameter objects filtered by the host column
 * @method     array findByHostTemplate(int $host_template) Return NagiosHostCheckCommandParameter objects filtered by the host_template column
 * @method     array findByParameter(string $parameter) Return NagiosHostCheckCommandParameter objects filtered by the parameter column
 *
 * @package    propel.generator..om
 */
abstract class BaseNagiosHostCheckCommandParameterQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseNagiosHostCheckCommandParameterQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'lilac', $modelName = 'NagiosHostCheckCommandParameter', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new NagiosHostCheckCommandParameterQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    NagiosHostCheckCommandParameterQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof NagiosHostCheckCommandParameterQuery) {
			return $criteria;
		}
		$query = new NagiosHostCheckCommandParameterQuery();
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
	 * @return    NagiosHostCheckCommandParameter|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = NagiosHostCheckCommandParameterPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(NagiosHostCheckCommandParameterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    NagiosHostCheckCommandParameter A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `HOST`, `HOST_TEMPLATE`, `PARAMETER` FROM `nagios_host_check_command_parameter` WHERE `ID` = :p0';
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
			$obj = new NagiosHostCheckCommandParameter();
			$obj->hydrate($row);
			NagiosHostCheckCommandParameterPeer::addInstanceToPool($obj, (string) $key);
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
	 * @return    NagiosHostCheckCommandParameter|array|mixed the result, formatted by the current formatter
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
	 * @return    NagiosHostCheckCommandParameterQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(NagiosHostCheckCommandParameterPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    NagiosHostCheckCommandParameterQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(NagiosHostCheckCommandParameterPeer::ID, $keys, Criteria::IN);
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
	 * @return    NagiosHostCheckCommandParameterQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(NagiosHostCheckCommandParameterPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the host column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHost(1234); // WHERE host = 1234
	 * $query->filterByHost(array(12, 34)); // WHERE host IN (12, 34)
	 * $query->filterByHost(array('min' => 12)); // WHERE host > 12
	 * </code>
	 *
	 * @see       filterByNagiosHost()
	 *
	 * @param     mixed $host The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NagiosHostCheckCommandParameterQuery The current query, for fluid interface
	 */
	public function filterByHost($host = null, $comparison = null)
	{
		if (is_array($host)) {
			$useMinMax = false;
			if (isset($host['min'])) {
				$this->addUsingAlias(NagiosHostCheckCommandParameterPeer::HOST, $host['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($host['max'])) {
				$this->addUsingAlias(NagiosHostCheckCommandParameterPeer::HOST, $host['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NagiosHostCheckCommandParameterPeer::HOST, $host, $comparison);
	}

	/**
	 * Filter the query on the host_template column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHostTemplate(1234); // WHERE host_template = 1234
	 * $query->filterByHostTemplate(array(12, 34)); // WHERE host_template IN (12, 34)
	 * $query->filterByHostTemplate(array('min' => 12)); // WHERE host_template > 12
	 * </code>
	 *
	 * @see       filterByNagiosHostTemplate()
	 *
	 * @param     mixed $hostTemplate The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NagiosHostCheckCommandParameterQuery The current query, for fluid interface
	 */
	public function filterByHostTemplate($hostTemplate = null, $comparison = null)
	{
		if (is_array($hostTemplate)) {
			$useMinMax = false;
			if (isset($hostTemplate['min'])) {
				$this->addUsingAlias(NagiosHostCheckCommandParameterPeer::HOST_TEMPLATE, $hostTemplate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($hostTemplate['max'])) {
				$this->addUsingAlias(NagiosHostCheckCommandParameterPeer::HOST_TEMPLATE, $hostTemplate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NagiosHostCheckCommandParameterPeer::HOST_TEMPLATE, $hostTemplate, $comparison);
	}

	/**
	 * Filter the query on the parameter column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByParameter('fooValue');   // WHERE parameter = 'fooValue'
	 * $query->filterByParameter('%fooValue%'); // WHERE parameter LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $parameter The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NagiosHostCheckCommandParameterQuery The current query, for fluid interface
	 */
	public function filterByParameter($parameter = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($parameter)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $parameter)) {
				$parameter = str_replace('*', '%', $parameter);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(NagiosHostCheckCommandParameterPeer::PARAMETER, $parameter, $comparison);
	}

	/**
	 * Filter the query by a related NagiosHost object
	 *
	 * @param     NagiosHost|PropelCollection $nagiosHost The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NagiosHostCheckCommandParameterQuery The current query, for fluid interface
	 */
	public function filterByNagiosHost($nagiosHost, $comparison = null)
	{
		if ($nagiosHost instanceof NagiosHost) {
			return $this
				->addUsingAlias(NagiosHostCheckCommandParameterPeer::HOST, $nagiosHost->getId(), $comparison);
		} elseif ($nagiosHost instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(NagiosHostCheckCommandParameterPeer::HOST, $nagiosHost->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByNagiosHost() only accepts arguments of type NagiosHost or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the NagiosHost relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NagiosHostCheckCommandParameterQuery The current query, for fluid interface
	 */
	public function joinNagiosHost($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('NagiosHost');

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
			$this->addJoinObject($join, 'NagiosHost');
		}

		return $this;
	}

	/**
	 * Use the NagiosHost relation NagiosHost object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NagiosHostQuery A secondary query class using the current class as primary query
	 */
	public function useNagiosHostQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinNagiosHost($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'NagiosHost', 'NagiosHostQuery');
	}

	/**
	 * Filter the query by a related NagiosHostTemplate object
	 *
	 * @param     NagiosHostTemplate|PropelCollection $nagiosHostTemplate The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NagiosHostCheckCommandParameterQuery The current query, for fluid interface
	 */
	public function filterByNagiosHostTemplate($nagiosHostTemplate, $comparison = null)
	{
		if ($nagiosHostTemplate instanceof NagiosHostTemplate) {
			return $this
				->addUsingAlias(NagiosHostCheckCommandParameterPeer::HOST_TEMPLATE, $nagiosHostTemplate->getId(), $comparison);
		} elseif ($nagiosHostTemplate instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(NagiosHostCheckCommandParameterPeer::HOST_TEMPLATE, $nagiosHostTemplate->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    NagiosHostCheckCommandParameterQuery The current query, for fluid interface
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
	 * @param     NagiosHostCheckCommandParameter $nagiosHostCheckCommandParameter Object to remove from the list of results
	 *
	 * @return    NagiosHostCheckCommandParameterQuery The current query, for fluid interface
	 */
	public function prune($nagiosHostCheckCommandParameter = null)
	{
		if ($nagiosHostCheckCommandParameter) {
			$this->addUsingAlias(NagiosHostCheckCommandParameterPeer::ID, $nagiosHostCheckCommandParameter->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseNagiosHostCheckCommandParameterQuery