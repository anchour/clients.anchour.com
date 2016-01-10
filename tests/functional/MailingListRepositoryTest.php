<?php

use App\Repositories\MailingListRepository;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Collection;

class MailingListRepositoryTest extends TestCase {

    /**
     * @var DatabaseMigrations
     */
    use DatabaseMigrations;

    /**
     * @var MailingListRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $mailingListEmail;

    /**
     * @var string
     */
    protected $mailingListName;

    public function setUp()
    {
        $this->repository       = new MailingListRepository();
        $this->mailingListEmail = 'email@domain.com';
        $this->mailingListName  = 'name';

        parent::setUp();
    }

    /** @test */
    public function it_inserts_a_row_to_the_database()
    {
        $this->insertRowIntoTable();

        $this->seeInDatabase('mailing_list', [
            'name'  => $this->mailingListName,
            'email' => $this->mailingListEmail
        ]);
    }

    /** @test */
    public function it_returns_the_row_by_email()
    {
        // Populate the database first.
        $this->insertRowIntoTable();

        // Retrieve the database.
        $data = $this->repository->get($this->mailingListEmail);

        // Check that the data matches the class data.
        $this->hasRowInDatabase($data);
    }

    /** @test */
    public function it_returns_all_rows_from_database()
    {
        $this->insertRowIntoTable('name1', 'email1');
        $this->insertRowIntoTable('name2', 'email2');
        $this->insertRowIntoTable('name3', 'email3');

        /**
         * @var Collection
         */
        $data = $this->repository->all();

        $this->assertTrue($data instanceof \Illuminate\Support\Collection);
        $this->assertTrue($data->count() === 3);
    }

    /**
     * @test
     */
    public function it_returns_an_empty_collection_when_no_rows_in_database()
    {
        /**
         * @var Collection
         */
        $data = $this->repository->all();

        $this->assertTrue($data instanceof \Illuminate\Support\Collection);
        $this->assertTrue($data->count() === 0);
    }

    /**
     * Add a row into the database.
     * @param string $name
     * @param string $email
     */
    private function insertRowIntoTable($name = '', $email = '')
    {
        if (! $name) {
            $name = $this->mailingListName;
        }

        if (! $email) {
            $email = $this->mailingListEmail;
        }

        $this->repository->insert(
            $name,
            $email
        );
    }

    /**
     * Check that the database has the name and email.
     *
     * @param $data
     */
    private function hasRowInDatabase($data)
    {
        $this->assertEquals($this->mailingListName, $data->name);
        $this->assertEquals($this->mailingListEmail, $data->email);
    }
}