Contexte du projet
FitNow , une plateforme qui veut créer une API solide pour que chaque client abonné puisse facilement suivre ses progrès physiques.
++Objectif :++

L'objectif principal de ce projet est de développer une API REST pour le suivi de condition physique, offrant à chaque utilisateur abonné la possibilité de gérer ses propres progrès physiques.
++User Stories :++

🔒 En tant qu'utilisateur, je souhaite pouvoir m'authentifier sur l'API à l'aide de Laravel Sanctum.

🏋️‍♂️ En tant qu'utilisateur, je veux pouvoir enregistrer mes données de progression physique, telles que le poids, les mensurations et les performances sportives, avec un statut par défaut de "Non terminé".

📊 En tant qu'utilisateur, je souhaite pouvoir consulter mes propres données de progression pour suivre mes progrès au fil du temps.

❌ En tant qu'utilisateur, je veux avoir la possibilité de supprimer mes propres données de progression si je le souhaite.

🔄 En tant qu'utilisateur, je veux avoir la possibilité de modifier mes propres données de progression sauf Status.

💪🏻 En tant qu'utilisateur, je souhaite pouvoir changer le statut de mes données de progression de "Non terminé" à "Terminé" lorsque j'ai complété une séance d'entraînement.

📈 En tant qu'utilisateur, je veux pouvoir consulter mon propre historique de progrès.

🧪 En tant que developpeur, je souhaite que des tests unitaires soient réalisés pour chaque fonctionnalité de l'API.

📝 En tant que developpeur, je veux que des tests sur Postman soient effectués pour valider le bon fonctionnement de l'API dans différents scénarios d'utilisation.

📄 En tant que developpeur, je veux une documentation détaillée de l'API, avec une description claire de chaque endpoint, pour simplifier l'intégration par d'autres développeurs. Cette documentation sera créée à l'aide d'outils tels que Postman, Swagger, API Blueprint ou d'autres outils similaires ayant le même objectif.
++BONUS:++

🔄 En tant qu'administrateur, possibilité de supprimer un utilisateur abonné et toutes ses données de progression enregistrées en utilisant la suppression en cascade.

🪄 En tant qu'utilisateur, je souhaite que les slugs soient automatiquement générés à partir du titre de la progression en utilisant le package Laravel-Sluggable de Spatie.
