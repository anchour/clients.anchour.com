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
        $this->repository->insert($this->mailingListName, $this->mailingListEmail);

        $this->seeInDatabase('mailing_list', [
            'name'  => $this->mailingListName,
            'email' => $this->mailingListEmail
        ]);
    }

    /** @test */
    public function it_returns_the_row_by_email()
    {
        $this->repository->insert($this->mailingListName, $this->mailingListEmail);

        $data = $this->repository->get($this->mailingListEmail);

        $this->assertEquals($this->mailingListName, $data->name);
        $this->assertEquals($this->mailingListEmail, $data->email);
    }

    /** @test */
    public function test_emails_in_database_are_unique()
    {
    }
}