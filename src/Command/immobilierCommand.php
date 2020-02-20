<?php


namespace App\Command;


use App\Entity\TypeDeBien;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class immobilierCommand extends Command
{

    protected static $listName = [
        [1, 'Appartement'],
        [2, 'Maison'],
        [3, 'Commerce'],
        [4, 'Annexe'],
        [5, 'immeuble'],
        [6, 'Neuf'],
        [7, 'Professionnel'],
        [8, 'Terrain'],
        [9, 'Stationnement'],
     ];
    protected $em;

    public function __construct(string $name = null, EntityManagerInterface $em)
    {
        $this->em = $em;
        parent::__construct($name);
    }

    protected function configure()
    {

        $this
            ->setName('immobilier:import:listName')
        ;

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $beginImport = new \DateTime();
        $output->writeln('<comment>---Start : ' . $beginImport->format('d-m-Y G:i:s') . ' ---</comment>');

        foreach ($this::$listName as $value) {
            $listName = new TypeDeBien();
            $listName->setRef($value[0]);
            $listName->setNom($value[1]);

            $this->em->persist($listName);
        }
        $this->em->flush();

        $endImport = new \DateTime();
        $output->writeln('');
        $output->writeln('<comment>---End : ' . $endImport->format('d-m-Y G:i:s') . ' ---</comment>');

        return 0;
   }
}