<?php


namespace App\Command;


use App\Entity\Chauffage;
use App\Entity\Option;
use App\Entity\Transaction;
use App\Entity\TypeDeBien;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class immobilierCommand extends Command
{

    protected static $listeBien = [
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

    protected static $listeTransaction = [
        [1, 'Vente'],
        [2, 'Location'],
     ];

    protected static $listeChauffage = [
        [1, 'Electrique'],
        [2, 'Gaz'],
        [3, 'Pompe a chaleur'],
        [4, 'Climatisation reversible']
    ];

    protected static $listeOption = [
        [1, 'Climatisation'],
        [2, 'Piscine'],
        [3, 'Balcon'],
        [4, 'Terrasse'],
        [5, 'Rez de chausse'],
        [6, 'Dernier etage'],
        [7, 'Cave'],
        [8, 'Acces PMR'],
        [9, 'Parking'],
        [10, 'Jardin'],
        [11, 'Ascenseur'],
        [12, 'Belle vue'],
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
            ->setName('import:listes');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $beginImport = new \DateTime();
        $output->writeln('<comment>---Start : ' . $beginImport->format('d-m-Y G:i:s') . ' ---</comment>');

        foreach ($this::$listeBien as $value) {
            $listeBien = new TypeDeBien();
            $listeBien->setRef($value[0]);
            $listeBien->setNom($value[1]);

            $this->em->persist($listeBien);
        }

        foreach ($this::$listeTransaction as $value) {
            $listeTransaction = new Transaction();
            $listeTransaction->setNom($value[1]);

            $this->em->persist($listeTransaction);
        }


        foreach ($this::$listeChauffage as $value) {
            $listeChauffage = new Chauffage();
            $listeChauffage->setNom($value[1]);

            $this->em->persist($listeChauffage);
        }

        foreach ($this::$listeOption as $value) {
            $listeOption = new Option();
            $listeOption->setNom($value[1]);

            $this->em->persist($listeOption);


        }

        $this->em->flush();

        $endImport = new \DateTime();
        $output->writeln('');
        $output->writeln('<comment>---End : ' . $endImport->format('d-m-Y G:i:s') . ' ---</comment>');

        return 0;
    }
}