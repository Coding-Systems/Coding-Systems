<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Coding house</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    <link id="cssTheme" rel="stylesheet" href="css/themes/default.css" title="defaultStyle"/>
    <link rel="stylesheet" href="css/app.scss"/>
    <link rel="stylesheet" href="css/pages/houses.scss"/>
</head>

<body>

@include("header")

<div class="container">

  <div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>

  <div class="card" id="Crackend_card">
    <div class="cardContent">
      <h3 class="title">Crack'End</h3>
      <div class="bar">
        <div class="emptybar"></div>
        <div class="filledbar"></div>
      </div>
      <div class="houseInfos">
        <section class="houseStory">
          <p>
            <img class="houseIconStory" src="img/logoCrackend.png" alt="logo de la maison">
          </p>
          <h2 class="secretTitle">Histoire</h2>
          <p class="story secret">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Donec molestie ligula euismod, suscipit urna quis, consectetur ex.
            Nulla mattis hendrerit massa, ut posuere nunc aliquam vel.
            Nulla et magna bibendum, molestie leo ut, vestibulum purus.
            Nulla suscipit, libero non vulputate vulputate, nunc neque cursus sem, in luctus dolor augue at massa.
            Quisque id gravida lectus, non placerat arcu.
            Aenean tempor, nulla at ultricies tincidunt, nisl lacus rhoncus augue, in eleifend lorem augue eget turpis.
            Nulla pellentesque accumsan odio eget porta.
            Nullam dignissim nec purus sed luctus.
            Phasellus blandit est condimentum dui interdum, nec dapibus turpis iaculis.
            Vivamus ullamcorper gravida quam.
          </p>
        </section>
        <section class="houseMembers secret">
          <h2>Membres</h2>

          <form class="houseRankForm">
            <select>
              <option>Ordre alphabétique</option>
              <option>Nombre de points</option>
              <option>Nombre de défis gagnés</option>
            </select>
            <button>Valider</button>
          </form>

          <div class="listMembers">
            <p>
              <br/> 1. blibli
              <br/> 2. blublu
              <br> 3. blibli
              <br> 4. blublu
              <br> 5. blibli
              <br/> 6. blublu
              <br/> 7. blibli
              <br/> 8. blublu
              <br/> 9. blibli
              <br/> 10. Anticonstitut
            </p>
            <p>
              <br/> 1. blibli
              <br/> 2. blublu
              <br> 3. blibli
              <br> 4. blublu
              <br> 5. blibli
              <br/> 6. blublu
              <br/> 7. blibli
              <br/> 8. blublu
              <br/> 9. blibli
              <br/> 10. Anticonstitutio
            </p>
          </div>
        </section>
      </div>
    </div>
  </div>
  <div class="card" id="Gitsune_card">
    <h3 class="title">Gitsune</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>
    </div>
    <div class="houseInfos">
      <section class="houseStory">
        <p>
          <img class="houseIconStory" src="img/logoGitsune.png" alt="logo de la maison">
        </p>
        <h2 class="secretTitle">Histoire</h2>
        <p class="story secret">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Donec molestie ligula euismod, suscipit urna quis, consectetur ex.
          Nulla mattis hendrerit massa, ut posuere nunc aliquam vel.
          Nulla et magna bibendum, molestie leo ut, vestibulum purus.
          Nulla suscipit, libero non vulputate vulputate, nunc neque cursus sem, in luctus dolor augue at massa.
          Quisque id gravida lectus, non placerat arcu.
          Aenean tempor, nulla at ultricies tincidunt, nisl lacus rhoncus augue, in eleifend lorem augue eget turpis.
          Nulla pellentesque accumsan odio eget porta.
          Nullam dignissim nec purus sed luctus.
          Phasellus blandit est condimentum dui interdum, nec dapibus turpis iaculis.
          Vivamus ullamcorper gravida quam.
        </p>
      </section>
      <section class="houseMembers secret">
        <h2>Membres</h2>

        <form class="houseRankForm">
          <select>
            <option>Ordre alphabétique</option>
            <option>Nombre de points</option>
            <option>Nombre de défis gagnés</option>
          </select>
          <button>Valider</button>
        </form>

        <div class="listMembers">
          <p>
            <br/> 1. blibli
            <br/> 2. blublu
            <br> 3. blibli
            <br> 4. blublu
            <br> 5. blibli
            <br/> 6. blublu
            <br/> 7. blibli
            <br/> 8. blublu
            <br/> 9. blibli
            <br/> 10. Anticonstitut
          </p>
          <p>
            <br/> 1. blibli
            <br/> 2. blublu
            <br> 3. blibli
            <br> 4. blublu
            <br> 5. blibli
            <br/> 6. blublu
            <br/> 7. blibli
            <br/> 8. blublu
            <br/> 9. blibli
            <br/> 10. Anticonstitutio
          </p>
        </div>
      </section>
    </div>
  </div>
  <div class="card" id="PhoeniXMl_Card">
    <h3 class="title">PhoeniXML</h3>
    <div class="bar">
      <div class="filledbar"></div>
      <div class="emptybar"></div>
    </div>
    <section class="houseInfos">
      <section class="houseStory">
        <p>
          <img class="houseIconStory" src="img/logoPhoenixml.png" alt="logo de la maison">
        </p>
        <h2 class="secretTitle">Histoire</h2>
        <p class="story secret">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Donec molestie ligula euismod, suscipit urna quis, consectetur ex.
          Nulla mattis hendrerit massa, ut posuere nunc aliquam vel.
          Nulla et magna bibendum, molestie leo ut, vestibulum purus.
          Nulla suscipit, libero non vulputate vulputate, nunc neque cursus sem, in luctus dolor augue at massa.
          Quisque id gravida lectus, non placerat arcu.
          Aenean tempor, nulla at ultricies tincidunt, nisl lacus rhoncus augue, in eleifend lorem augue eget turpis.
          Nulla pellentesque accumsan odio eget porta.
          Nullam dignissim nec purus sed luctus.
          Phasellus blandit est condimentum dui interdum, nec dapibus turpis iaculis.
          Vivamus ullamcorper gravida quam.
        </p>
      </section>
      <section class="houseMembers secret">

        <h2>Membres</h2>

        <form class="houseRankForm">
          <select>
            <option>Ordre alphabétique</option>
            <option>Nombre de points</option>
            <option>Nombre de défis gagnés</option>
          </select>
          <button>Valider</button>
        </form>

        <div class="listMembers">
          <p>
            <br/> 1. blibli
            <br/> 2. blublu
            <br> 3. blibli
            <br> 4. blublu
            <br> 5. blibli
            <br/> 6. blublu
            <br/> 7. blibli
            <br/> 8. blublu
            <br/> 9. blibli
            <br/> 10. Anticonstitut
          </p>
          <p>
            <br/> 1. blibli
            <br/> 2. blublu
            <br> 3. blibli
            <br> 4. blublu
            <br> 5. blibli
            <br/> 6. blublu
            <br/> 7. blibli
            <br/> 8. blublu
            <br/> 9. blibli
            <br/> 10. Anticonstitutio
          </p>
        </div>
      </section>
    </section>
  </div>
</div>

@include("footer")

</body>

</html>
