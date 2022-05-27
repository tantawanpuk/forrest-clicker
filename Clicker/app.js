var data = {
  seeds: 0,
  saplings: 0,
  trees: 0,
  woods: 0,
  forests: 0,
};

var game = {
  init() {
    BuySapling.onclick = () => game.getSapling();
    BuyTree.onclick = () => game.getTree();
    BuyWood.onclick = () => game.getWood();
    BuyForest.onclick = () => game.getForest();
  },
  tick() {
    data.seeds += 0.1 * data.saplings;
    data.seeds += 1 * data.trees;
    data.seeds += 10 * data.woods;
    data.seeds += 100 * data.forests;
    game.updateDisplay();
  },
  updateDisplay() {
    showSeed.innerText = data.seeds.toFixed(1);
    saplingContainer.hidden = data.saplings == 0 && !game.canGetSapling();
    treeContainer.hidden = data.trees == 0 && !game.canGetTree();
    woodContainer.hidden = data.woods == 0 && !game.canGetWood();
    forestContainer.hidden = data.forests == 0 && !game.canGetForest();
    BuySapling.hidden = data.saplings == 0 && !game.canGetSapling();
    BuyTree.hidden = data.trees == 0 && !game.canGetTree();
    BuyWood.hidden = data.woods == 0 && !game.canGetWood();
    BuyForest.hidden = data.forests == 0 && !game.canGetForest();
    BuyPicSapling.hidden = data.saplings == 0 && !game.canGetSapling();
    BuyPicTree.hidden = data.trees == 0 && !game.canGetTree();
    BuyPicWood.hidden = data.woods == 0 && !game.canGetWood();
    BuyPicForest.hidden = data.forests == 0 && !game.canGetForest();
    saplingCost.innerText = game.getSaplingCost();
    saplingCount.innerText = data.saplings;
    treeCost.innerText = game.getTreeCost();
    treeCount.innerText = data.trees;
    woodCost.innerText = game.getWoodCost();
    woodCount.innerText = data.woods;
    forestCost.innerText = game.getForestCost();
    forestCount.innerText = data.forests;
    showSps.innerText = (
      0.1 * data.saplings +
      1 * data.trees +
      10 * data.woods +
      100 * data.forests
    ).toFixed(1);
    if (
      0.1 * data.saplings +
        1 * data.trees +
        10 * data.woods +
        100 * data.forests <=
      1
    ) {
      document.body.style.backgroundColor = "#EFB6BC";
    } else if (
      0.1 * data.saplings +
        1 * data.trees +
        10 * data.woods +
        100 * data.forests <=
      250
    ) {
      document.body.style.backgroundColor = "#F7D7C4";
    } else if (
      0.1 * data.saplings +
        1 * data.trees +
        10 * data.woods +
        100 * data.forests <=
      500
    ) {
      document.body.style.backgroundColor = "#FEF0DB";
    } else if (
      0.1 * data.saplings +
        1 * data.trees +
        10 * data.woods +
        100 * data.forests <=
      1000
    ) {
      document.body.style.backgroundColor = "#A8E0D6";
    } else {
      document.body.style.backgroundColor = "#C8F2D7";
    }
  },
  getSeed() {
    data.seeds++;
    game.updateDisplay();
  },
  getSaplingCost() {
    return data.saplings + 10;
  },
  getTreeCost() {
    return data.trees * 10 + 100;
  },
  getWoodCost() {
    return data.woods * 100 + 1000;
  },
  getForestCost() {
    return data.forests * 1000 + 10000;
  },
  canGetSapling() {
    return data.seeds >= game.getSaplingCost();
  },
  canGetTree() {
    return data.seeds >= game.getTreeCost();
  },
  canGetWood() {
    return data.seeds >= game.getWoodCost();
  },
  canGetForest() {
    return data.seeds >= game.getForestCost();
  },
  getSapling() {
    if (game.canGetSapling()) {
      data.seeds -= game.getSaplingCost();
      data.saplings++;
    }
    game.updateDisplay();
  },
  getTree() {
    if (game.canGetTree()) {
      data.seeds -= game.getTreeCost();
      data.trees++;
    }
    game.updateDisplay();
  },
  getWood() {
    if (game.canGetWood()) {
      data.seeds -= game.getWoodCost();
      data.woods++;
    }
    game.updateDisplay();
  },
  getForest() {
    if (game.canGetForest()) {
      data.seeds -= game.getForestCost();
      data.forests++;
    }
    game.updateDisplay();
  },
  save() {
    console.log(data.seeds);
    $.ajax({
      url: "savegame.php",
      method: "post",
      data: { data: JSON.stringify(data), seeds: data.seeds },
      success: function (res) {
        console.log(res);
      },
    });
  },
  load() {
    function testAjax() {
      var result = "";
      $.ajax({
        url: "loadgame.php",
        async: false,
        success: function (data) {
          result = data;
        },
      });
      return result;
    }
    var datas = testAjax();
    Object.assign(data, JSON.parse(datas));
    game.init();
    game.updateDisplay();
  },
  clearSave() {
    var reset = { seeds: 0, saplings: 0, trees: 0, woods: 0, forests: 0 };
    $.ajax({
      url: "savegame.php",
      method: "post",
      data: { data: JSON.stringify(reset) },
      success: function (res) {
        console.log(res);
      },
    });
    location.reload();
  },
  start() {
    setInterval(() => game.tick(), 1e3);
    setInterval(() => game.save(), 5e3);
  },
};
try {
  game.load();
} catch {
  var data = {
    seeds: 0,
    saplings: 0,
    trees: 0,
    woods: 0,
    forests: 0,
  };
  game.init();
  game.updateDisplay();
}
game.start();

