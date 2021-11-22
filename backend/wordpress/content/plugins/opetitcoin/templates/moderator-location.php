<?php get_header(); ?>
<main>
    <section>
        <h2>My location</h2>
        <table style="width:100%;color:black;margin:2em;">
            <thead>
                <tr style="font-size:1.5em;">
                    <td></td>
                    <td>Département</td>
                    <td>code postal</td>
                    <td>Supprimer</td>
                </tr>
            </thead>
            <tbody>
                <?php // TODO boucle foreach pour l'affichage des départements 
                ?>
                <tr>
                    <td><?php //department_id ?></td>
                    <td><?php //postal_code ?></td>
                </tr>
            </tbody>
        </table>

        <h2>Ajouter un département</h2>
        <form style="padding: 0 2em 3em 2em;" method="post">
            <select name="department_id" id="">
                <?php // TODO boucle des département ?>
            </select>
            <input type="number" name="level" value="0">
            <input type="submit" name="" id="">
        </form>
        
    </section>
</main>
<?php get_footer(); ?>