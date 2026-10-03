<?php $page = 'ui';
require 'blocks/head.php'; ?>

<body>
  <?php require 'blocks/header.php'; ?>

  <div class="content">
    <div class="container">
      <div class="text">
        <h1><a href="#">Title H1 : Lorem ipsum dolor sit amet</a></h1>

        <p>Lorem ipsum dolor sit amet, <strong>consectetur</strong> adipiscing elit. <em>Nullam feugiat tincidunt urna id efficitur</em>. <u>Pellentesque</u> ut urna at ligula <del>vestibulum</del> posuere sed et <abbr title="Mauris vitae ultricies sapien">turpis</abbr>. Mauris vitae ultricies sapien, et scelerisque mi. Aliquam gravida interdum cursus. Integer massa ante, tempus sit amet venenatis sit amet, fermentum nec risus. Donec auctor eu nisi sagittis lacinia. <a href="#">Donec auctor eu nisi sagittis lacinia.</a>, eu malesuada dui ornare eget.</p>

        <h2>Title H2 : Lorem ipsum dolor sit amet</h2>

        <p>Fusce ultrices odio ac vestibulum vulputate. Fusce lacinia in metus ac convallis. Proin magna tortor, molestie id velit non, aliquet viverra leo. Cras magna magna, aliquet volutpat ex rhoncus, pellentesque ornare lorem. Cras cursus ante a posuere fermentum. Nulla eget odio mollis, ultrices nisl sed, congue ante. Sed bibendum tristique dolor ut lobortis. Sed quis massa et diam mollis sodales. Curabitur vitae justo ornare, auctor ante ut, eleifend lorem.</p>

        <h3>Title H3 : Lorem ipsum dolor sit amet</h3>

        <p>Lorem ipsum dolor sit amet, <strong>consectetur</strong> adipiscing elit. <em>Nullam feugiat tincidunt urna id efficitur</em>. <u>Pellentesque</u> ut urna at ligula <del>vestibulum</del> posuere sed et <abbr title="Mauris vitae ultricies sapien">turpis</abbr>. Mauris vitae ultricies sapien, et scelerisque mi. Aliquam gravida interdum cursus. Integer massa ante, tempus sit amet venenatis sit amet, fermentum nec risus. Donec auctor eu nisi sagittis lacinia. <a href="#">Donec auctor eu nisi sagittis lacinia.</a>, eu malesuada dui ornare eget.</p>

        <h4>Title H4 : Lorem ipsum dolor sit amet</h4>

        <p>Fusce ultrices odio ac vestibulum vulputate. Fusce lacinia in metus ac convallis. Proin magna tortor, molestie id velit non, aliquet viverra leo. Cras magna magna, aliquet volutpat ex rhoncus, pellentesque ornare lorem. Cras cursus ante a posuere fermentum. Nulla eget odio mollis, ultrices nisl sed, congue ante. Sed bibendum tristique dolor ut lobortis. Sed quis massa et diam mollis sodales. Curabitur vitae justo ornare, auctor ante ut, eleifend lorem.</p>

        <h5>Title H5 : Lorem ipsum dolor sit amet</h5>

        <p>
          <button type="button" class="btn" data-src="#popup-window" data-fancybox>Открыть попап</button>
          <button type="button" class="btn btn_outline" data-src="#popup-window" data-fancybox>Открыть попап</button>
        </p>

        <h6>Title H6 : Lorem ipsum dolor sit amet</h6>

        <ul>
          <li>Lorem ipsum dolor sit amet</li>
          <li>Nullam feugiat tincidunt urna
            <ul>
              <li>Lorem ipsum dolor sit amet</li>
              <li>Nullam feugiat tincidunt urna
                <ul>
                  <li>Lorem ipsum dolor sit amet</li>
                  <li>Nullam feugiat tincidunt urna</li>
                  <li>Pellentesque ut urna at ligula</li>
                  <li>Mauris vitae ultricies sapien</li>
                  <li>Aliquam gravida interdum cursus</li>
                </ul>
              </li>
              <li>Pellentesque ut urna at ligula</li>
              <li>Mauris vitae ultricies sapien</li>
              <li>Aliquam gravida interdum cursus</li>
            </ul>
          </li>
          <li>Pellentesque ut urna at ligula</li>
          <li>Mauris vitae ultricies sapien</li>
          <li>Aliquam gravida interdum cursus</li>
        </ul>

        <ol>
          <li>Lorem ipsum dolor sit amet</li>
          <li>Nullam feugiat tincidunt urna</li>
          <li>Pellentesque ut urna at ligula</li>
          <li>Mauris vitae ultricies sapien</li>
          <li>Aliquam gravida interdum cursus</li>
        </ol>

        <div class="table-wrapper">
          <table class="table">
            <tr>
              <th>Title 1</th>
              <th>Title 2</th>
              <th>Title 3</th>
              <th>Title 4</th>
              <th>Title 5</th>
            </tr>
            <tr>
              <td>Lorem ipsum dolor sit amet</td>
              <td>Nullam feugiat tincidunt urna</td>
              <td>Pellentesque ut urna at ligula</td>
              <td>Mauris vitae ultricies sapien</td>
              <td>Aliquam gravida interdum cursus</td>
            </tr>
            <tr>
              <td>Lorem ipsum dolor sit amet</td>
              <td>Nullam feugiat tincidunt urna</td>
              <td>Pellentesque ut urna at ligula</td>
              <td>Mauris vitae ultricies sapien</td>
              <td>Aliquam gravida interdum cursus</td>
            </tr>
            <tr>
              <td>Lorem ipsum dolor sit amet</td>
              <td>Nullam feugiat tincidunt urna</td>
              <td>Pellentesque ut urna at ligula</td>
              <td>Mauris vitae ultricies sapien</td>
              <td>Aliquam gravida interdum cursus</td>
            </tr>
          </table>
        </div>
      </div>

      <form class="js-validation-form-">
        <div class="form-check">
          <label>
            <input type="checkbox" name="checkbox" data-msg-required="Обязательный пункт" required>
            <span class="form-check__btn">
              <span class="form-check__icon"></span>
              <span class="form-check__text">Чекбокс кнопка</span>
            </span>
          </label>
        </div>

        <div class="form-check">
          <label>
            <input type="checkbox" name="checkbox-2" data-msg-required="Обязательный пункт" required disabled>
            <span class="form-check__btn">
              <span class="form-check__icon"></span>
              <span class="form-check__text">Неактивная чекбокс кнопка</span>
            </span>
          </label>
        </div>

        <div class="form-check">
          <label>
            <input type="radio" name="radio" data-msg-required="Обязательный пункт" required>
            <span class="form-check__btn">
              <span class="form-check__icon"></span>
              <span class="form-check__text">Радио кнопка</span>
            </span>
          </label>
        </div>

        <div class="form-check">
          <label>
            <input type="radio" name="radio">
            <span class="form-check__btn">
              <span class="form-check__icon"></span>
              <span class="form-check__text">Радио кнопка</span>
            </span>
          </label>
        </div>

        <div class="form-check">
          <label>
            <input type="radio" name="radio" disabled>
            <span class="form-check__btn">
              <span class="form-check__icon"></span>
              <span class="form-check__text">Неактивная радио кнопка</span>
            </span>
          </label>
        </div>

        <div class="form-group">
          <label class="form-label">Имя</label>
          <input type="text" class="form-control" placeholder="Имя" name="name" required>
        </div>

        <div class="form-group">
          <label class="form-label">Количество</label>
          <div class="number-control">
            <input type="number" class="number-control__input form-control" value="7" min="5" max="10">
            <span class="number-control__btn _minus"></span>
            <span class="number-control__btn _plus"></span>
          </div>
        </div>

        <div class="form-group form-floating">
          <input type="text" class="form-control" placeholder=" " name="name" required>
          <label class="form-label">Имя</label>
        </div>

        <div class="form-group form-floating">
          <input type="text" class="form-control" placeholder=" " disabled>
          <label class="form-label">Неактивное поле</label>
        </div>

        <div class="form-group">
          <select class="form-select">
            <button>
              <svg class="icon">
                <use xlink:href="assets/images/svg-sprite.svg?<?= $ver; ?>#close"></use>
              </svg>
              <selectedcontent></selectedcontent>
            </button>

            <option>Nullam feugiat tincidunt urna</option>
            <option>Pellentesque ut urna at ligula</option>
            <option>Mauris vitae ultricies sapien</option>
            <option>Aliquam gravida interdum cursus</option>
          </select>
        </div>

        <div class="form-group form-floating">
          <select class="form-select" name="select" required>
            <option></option>
            <option>Nullam feugiat tincidunt urna</option>
            <option>Pellentesque ut urna at ligula</option>
            <option>Mauris vitae ultricies sapien</option>
            <option>Aliquam gravida interdum cursus</option>
          </select>
          <label class="form-label">Селект поле</label>
        </div>

        <div class="form-group form-floating">
          <select class="form-select" disabled>
            <option></option>
            <option>Nullam feugiat tincidunt urna</option>
            <option>Pellentesque ut urna at ligula</option>
            <option>Mauris vitae ultricies sapien</option>
            <option>Aliquam gravida interdum cursus</option>
          </select>
          <label class="form-label">Неактивное селект поле</label>
        </div>

        <div class="form-group form-floating">
          <textarea class="form-control" placeholder=" " rows="5" name="textarea" required></textarea>
          <label class="form-label">Текстовое поле</label>
        </div>

        <div class="form-group">
          <label class="form-label">Поле для выбора файла</label>
          <input type="file" class="form-control" name="file" data-msg-required="Выберите файл" required>
        </div>

        <div class="form-group">
          <label class="form-label">Неактивное поле для выбора файла</label>
          <input type="file" class="form-control" disabled>
        </div>

        <div class="form-group text-center">
          <button type="submit" class="btn">Отправить</button>
        </div>
      </form>
    </div>

    <div class="popup-window" id="popup-window">
      <div class="popup-window__content">
        <h2>Popup Title</h2>
        <div class="has-scrollbar" style="max-height: 16em;">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam recusandae veniam earum, dolor iure soluta ducimus, labore reiciendis maxime deleniti voluptatum autem deserunt laudantium officiis accusamus laborum inventore error quidem.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam recusandae veniam earum, dolor iure soluta ducimus, labore reiciendis maxime deleniti voluptatum autem deserunt laudantium officiis accusamus laborum inventore error quidem.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam recusandae veniam earum, dolor iure soluta ducimus, labore reiciendis maxime deleniti voluptatum autem deserunt laudantium officiis accusamus laborum inventore error quidem.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam recusandae veniam earum, dolor iure soluta ducimus, labore reiciendis maxime deleniti voluptatum autem deserunt laudantium officiis accusamus laborum inventore error quidem.</p>
        </div>
      </div>
    </div>
  </div>

  <?php require 'blocks/footer.php'; ?>
  <?php require 'blocks/foot.php'; ?>
</body>

</html>