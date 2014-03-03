<?php
namespace Entity;

use \Doctrine\Common\Collections\ArrayCollection;

/**
 * @Table(name="station_requests")
 * @Entity
 */
class StationRequest extends \DF\Doctrine\Entity
{
    public function __construct()
    {
        $this->timestamp = time();
        $this->ip = $_SERVER['REMOTE_ADDR'];
    }

    /**
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /** @Column(name="station_id", type="integer") */
    protected $station_id;

    /** @Column(name="track_id", type="integer") */
    protected $track_id;

    /** @Column(name="timestamp", type="integer") */
    protected $timestamp;

    /** @Column(name="ip", type="string", length=15) */
    protected $ip;

    /**
     * @ManyToOne(targetEntity="Station", inversedBy="media")
     * @JoinColumns({
     *   @JoinColumn(name="station_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    protected $station;

    /**
     * @ManyToOne(targetEntity="StationMedia")
     * @JoinColumns({
     *   @JoinColumn(name="track_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    protected $track;
}