<?php

use App\Repositories\MailingListRepository;

use Barryvdh\LaravelIdeHelper\Generator;
use Faker\Provider\Internet;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Faker\Generator as Faker;

class MailingListRepositoryTest extends TestCase {

    use DatabaseMigrations;

    /**
     * @var MailingListRepository
     */
    protected $repository;
    protected $mailingListEmail;
    protected $mailingListName;
    /**
     * @var Generator
     */
    private $faker;

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

        $data = $this->repository->all();

        $this->assertCount(3, $data);
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