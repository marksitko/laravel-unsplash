<?php

namespace MarkSitko\LaravelUnsplash\Queries;

trait QueryBuilder
{
    public $query = [];

    /* ###### List photos params ###### */

    /**
     * Page number to retrive.
     * @param int|string $param
     * @return MarkSitko\LaravelUnsplash\Queries\QueryBuilder
     */
    public function page( $param = null )
    {
        $this->query['page'] = $param ?? null;
        return $this;
    }

    /**
     * Number of items per page
     * @param int|string $param
     * @return MarkSitko\LaravelUnsplash\Queries\QueryBuilder
     */
    public function perPage( $param = null )
    {
        $this->query['per_page'] = $param ?? null;
        return $this;
    }

    /**
     * How to sort the photos.
     * @param int|string $param Valid values: latest, oldest, popular
     * @return MarkSitko\LaravelUnsplash\Queries\QueryBuilder
     */
    public function orderBy( $param = null )
    {
        $this->query['order_by'] = $param ?? null;
        return $this;
    }


    /* ###### Random photos params ###### */

    /**
     * Public collection ID(‘s) to filter selection. If multiple, comma-separated.
     * @param string $param
     * @return MarkSitko\LaravelUnsplash\Queries\QueryBuilder
     */
    public function collections( $param = null )
    {
        $this->query['collections'] = $param ?? null;
        return $this;
    }

    /**
     * Limit selection to featured photos.
     * @param string $param
     * @return MarkSitko\LaravelUnsplash\Queries\QueryBuilder
     */
    public function featured( $param = null )
    {
        $this->query['featured'] = $param ?? null;
        return $this;
    }

    /**
     * Limit selection to a single user.
     * @param string $param
     * @return MarkSitko\LaravelUnsplash\Queries\QueryBuilder
     */
    public function username( $param = null )
    {
        $this->query['username'] = $param ?? null;
        return $this;
    }

    /**
     * Filter search results by photo orientation.
     * @param string $param Valid values: landscape, portrait, and squarish
     * @return MarkSitko\LaravelUnsplash\Queries\QueryBuilder
     */
    public function orientation( $param = null )
    {
        $this->query['orientation'] = $param ?? null;
        return $this;
    }

    /**
     * Limit selection to photos matching a search term.
     * @param string $param
     * @return MarkSitko\LaravelUnsplash\Queries\QueryBuilder
     */
    public function term( $param = null )
    {
        $this->query['query'] = $param ?? null;
        return $this;
    }

    /**
     * The number of photos to return.
     * @param int|string $param min 1, max 30
     * @return MarkSitko\LaravelUnsplash\Queries\QueryBuilder
     */
    public function count( $param = null )
    {
        $this->query['count'] = $param ?? null;
        return $this;
    }


    /* ###### Photos Statistics params ###### */

    /**
     * The public id of the photo.
     * @param int|string $param required
     * @return MarkSitko\LaravelUnsplash\Queries\QueryBuilder
     */
    public function id( $param = null )
    {
        $this->query['id'] = $param ?? null;
        return $this;
    }

    /**
     * The frequency of the stats.
     * @param string $param default days
     * @return MarkSitko\LaravelUnsplash\Queries\QueryBuilder
     */
    public function resolution( $param = null )
    {
        $this->query['resolution'] = $param ?? null;
        return $this;
    }

    /**
     * The amount of for each stat.
     * @param int|string $param
     * @return MarkSitko\LaravelUnsplash\Queries\QueryBuilder
     */
    public function quantity( $param = null )
    {
        $this->query['quantity'] = $param ?? null;
        return $this;
    }


    /* ###### Search photos params ###### */

    /**
     * Filter results by color.
     * @param string $param Valid values are: black_and_white, black, white, yellow, orange, red, purple, magenta, green, teal, and blue.
     * @return MarkSitko\LaravelUnsplash\Queries\QueryBuilder
     */
    public function color( $param = null )
    {
        $this->query['color'] = $param ?? null;
        return $this;
    }

    /**
     * Query for search terms
     * @param string $param
     * @return MarkSitko\LaravelUnsplash\Queries\QueryBuilder
     */
    public function query( $param = null )
    {
        $this->query['query'] = $param ?? null;
        return $this;
    }


    public function getQuery()
    {
        return http_build_query($this->query, '', '&');
    }

}
