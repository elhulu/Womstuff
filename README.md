# Ecommerce

Le but est de créer une plateforme de site marchand avec le maximum de
fonctionnalités.

## Contraintes

Pour réaliser ce projet j'utilise le framework MVC cakePHP.
Pour ce qui concerne le JavaScript, jQuery est notre meilleur ami.

## Le catalogue

• Articles avec description, photo, caracteristiques complètes et prix

• Un système de recherche avancée avec plusieurs niveaux de catégories (catégories -> sous catégories)
et recherche par texte dans descriptif, nom, catégorie.

• La possibilité de mettre des articles dans un panier ou un caddie.

• Etat du caddie affiché sur toutes les pages (liste des produits, quantité, prix, total).

• Des articles peuvent etre declinés en plusieurs couleurs et tailles. 
Un prix différent est defini pour chaque variante du même article.

• Calcul des frais de port en fonction du poids, du pays de livraison, du mode d’ex-
pédition ou selon un forfait.

• Une fiche detaillée permet de mettre en valeur chaque produit. 
Entierement paramétrable, cette fiche autorise l’affichage d’une grande quantité 
de textes et supporte les elements multimedias tels que videos, images panoramiques 360 ...



## Les commandes

• Caddie sophistiqué, avec fonctions de modification des quantités, suppression d’ar-
ticles, affichage du montant de la commande. En plus des rabais sur des produits,
le caddie prend en compte les rabais client.

• Validation d’une commande par simple identification du client.

• Suivi de l’etat de ses commandes avec références, date, détails et statut de traite-
ment.

• Enregistrement des coordonnées des clients via un formulaire convivial et rapide,
avec verification avancée et formatage des entrées.

• Interface de gestion personnelle du compte client.

• Impression d’une facture

• Pouvoir commander en tant qu’utilisateur connu et enregistré, avec listes d’adresses
perso de livraison/facturation

• Pouvoir commander en tant que guest sans creer de compte



# Administration du catalogue

• Affichage des informations relatives à l’état des commandes de la boutique sur la
page de garde.

• Ajout, modification et suppression d’articles en quelques secondes, avec possibilité
de traitement par lot.

• Gestion du statut des articles. Cette fonction permet de définir le comportement
des articles dans le catalogue.

• Selon les besoins, un article peut etre declaré en promotion, nouveauté, etc.

• Gestion de stocks des commande à faire et des fournisseurs.

• Gestion des catégories, avec possibilité d’ajout, de suppression et de déplacement de catégories.


## Administration des comptes clients

• Possibilité de restreindre les modes de paiement pour chaque client.

• Des rabais peuvent être définis pour chaque client.


## Administration des livraisons

• Gestion des frais de port en fonction du pays et du mode de livraison.

• Enregistrement du poids de chaque article et calcul des frais de port en conséquence.

• Choix des modes de paiement actifs (facture, carte de crédit, chèque ou virement).

• Exportation des données au format Excel (liste des clients, commandes, articles).
