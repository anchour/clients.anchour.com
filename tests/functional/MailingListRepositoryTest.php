<?php

use App\Repositories\MailingListRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MailingListRepositoryTest extends TestCase {

    use DatabaseMigrations;

    /**
     * @var MailingListRepository
     */
    protected $repository;
    protected $mailingListEmail;
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

    /**
     * Add a row into the database.
     */
    private function insertRowIntoTable()
    {
        $this->repository->insert(
            $this->mailingListName,
            $this->mailingListEmail
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