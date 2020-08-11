<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\{Document, DocumentParagraph};

class DocumentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $document = new Document();
        $document->setName('Document 1');

        $manager->persist($document);

        for ($i = 0; $i <= 5; $i++) {
            $paragraph = new DocumentParagraph();
            $paragraph->setDocument($document);

            $paragraph->setContent("Note that modification of the License, You hereby grant to any actual or alleged intellectual property
                rights needed, if any. For example, a Contributor with respect to disputes in which at least ONE of the
                Standard Version without the Source, provided that you create or to which Licensor or any Contributor
                under this License shall be deemed to grant the rights that you provide along with the CC-BY-SA license
                or settlement) prior to termination shall survive any termination of this Agreement. Other Exploitation
                shall mean products provided to the author to ask you to make, use, sell, offer to sell, import and
                otherwise using this file. The Original Code (or portions thereof); and 2) the combination of their
                Contribution(s) alone or in any medium without restriction, either gratis or for a component of the
                Package. Distributor Fees are permitted, and licensing fees for other components in the License.) 3.");

            $manager->persist($paragraph);
        }

        $manager->flush();
    }
}
