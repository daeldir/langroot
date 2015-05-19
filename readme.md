# Langroot

Un petit projet personnel utilisé pour décomposer les mots en un réseau de
concept et en tirer des « racines » afin d'avoir un choix pertinent de racines
quand je m'amuse à créer une langue.

Le projet est juste un brouillon, les algorithmes sont naïfs, mais la base de
donnée est dans un format très facilement utilisable: chaque mot a son propre
fichier, le contenu du fichier est les concepts qui « mènent » à ce mot (qui
sont candidats pour être des racines de ce mot).

On ne parle pas des racines étymologiques liées à notre langue (Langroot
devrait d'ailleurs permettre de lier des mots de plusieurs langues, même si ce
n'est pas le cas actuellement), mais des mots qui _pourraient_ être des
racines. Par exemple, « machine » n'est pas une racine de « voiture » en
français, mais si je devais inventer le mot « voiture » dans une langue qui a
déjà le mot « machine », je pourrais l'utiliser comme racine.

La base de donnée française est dans un autre dépôt, ce dépôt-ci ne devrait
contenir que du code.

L'interface est en français, mais le code en anglais, peu commenté. Tout le
code PHP est « artisanal ». Bootstrap est utilisé pour le style, parce que la
flemme, c'est un brouillon :-°

