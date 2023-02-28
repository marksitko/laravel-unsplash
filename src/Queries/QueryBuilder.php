<?php

namespace MarkSitko\LaravelUnsplash\Queries;

trait QueryBuilder
{
    public $query = [];

    /* ###### List photos params ###### */

    /**
     * Page number to retrive.
     * @param int|string $param
     */
    public function page($param = null): self
    {
        $this->query['page'] = $param ?? null;

        return $this;
    }

    /**
     * Number of items per page.
     * @param int|string $param
     */
    public function perPage($param = null): self
    {
        $this->query['per_page'] = $param ?? null;

        return $this;
    }

    /**
     * How to sort the photos.
     * @param int|string $param Valid values: latest, oldest, popular
     */
    public function orderBy($param = null): self
    {
        $this->query['order_by'] = $param ?? null;

        return $this;
    }

    /* ###### Random photos params ###### */

    /**
     * Public collection ID(‘s) to filter selection. If multiple, comma-separated.
     * @param string $param
     */
    public function collections($param = null): self
    {
        $this->query['collections'] = $param ?? null;

        return $this;
    }

    /**
     * Limit selection to featured photos.
     * @param string $param
     */
    public function featured($param = null): self
    {
        $this->query['featured'] = $param ?? null;

        return $this;
    }

    /**
     * Limit selection to a single user.
     * @param string $param
     */
    public function username($param = null): self
    {
        $this->query['username'] = $param ?? null;

        return $this;
    }

    /**
     * Filter search results by photo orientation.
     * @param string $param Valid values: landscape, portrait, and squarish
     */
    public function orientation($param = null): self
    {
        $this->query['orientation'] = $param ?? null;

        return $this;
    }

    /**
     * Limit selection to photos matching a search term.
     * @param string $param
     */
    public function term($param = null): self
    {
        $this->query['query'] = $param ?? null;

        return $this;
    }

    /**
     * The number of photos to return.
     * @param int|string $param min 1, max 30
     */
    public function count($param = null): self
    {
        $this->query['count'] = $param ?? null;

        return $this;
    }

    /* ###### Photos Statistics params ###### */

    /**
     * The public id of the photo.
     * @param int|string $param required
     */
    public function id($param = null): self
    {
        $this->query['id'] = $param ?? null;

        return $this;
    }

    /**
     * The frequency of the stats.
     * @param string $param default days
     */
    public function resolution($param = null): self
    {
        $this->query['resolution'] = $param ?? null;

        return $this;
    }

    /**
     * The amount of for each stat.
     * @param int|string $param
     */
    public function quantity($param = null): self
    {
        $this->query['quantity'] = $param ?? null;

        return $this;
    }

    /* ###### Search photos params ###### */

    /**
     * Filter results by color.
     * @param string $param Valid values are: black_and_white, black, white, yellow, orange, red, purple, magenta, green, teal, and blue.
     */
    public function color($param = null): self
    {
        $this->query['color'] = $param ?? null;

        return $this;
    }

    /**
     * Query for search terms.
     * @param string $param
     */
    public function query($param = null): self
    {
        $this->query['query'] = $param ?? null;

        return $this;
    }

    /* ###### Topics params ###### */

    /**
     * Query for ids.
     * @param string $param
     */
    public function ids($param = null): self
    {
        $this->query['ids'] = $param ?? null;

        return $this;
    }

    public function getQuery(): string
    {
        return http_build_query($this->query, '', '&');
    }
}
