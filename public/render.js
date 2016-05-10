class CategoryBox extends React.Component {

  constructor() {
    super();
    this.state = {
      categories: [
        { name: '載入主類別...',
            game_type: 'desktop',
            id: 0,
            big_categories: [
              {
                name: '載入問題類別...',
                id: 0,
                small_categories: [
                  {
                    name: '載入問題項目...',
                    id: 0,
                  },
                ],
              },
            ],
        }],
    };
  }

  componentWillMount() {
    let categories = [];
    $.get('categories', function (data) {
      categories = data.filter(category =>
        category.game_type === 'mobile'
      );

      this.setState({
        categories: categories,
      });
    }.bind(this));
  }

  render() {
    return (
        <div>
            <MainCategory categories={this.state.categories} />
            <BigCategory />
            <SmallCategory />
        </div>
    );
  }
}

class MainCategory extends React.Component {
  render() {
    let options = this.props.categories.map(mainCategory => {
      return (
        <option key={mainCategory.id}>{mainCategory.name}</option>
      );
    });
    return (
      <select>
        {options}
      </select>
    )
  }
}

class BigCategory extends React.Component {
  render () {
    return (
        <select>
            <option></option>
        </select>
    )
  }
}

class SmallCategory extends React.Component {
  render () {
    return (
        <select>
            <option></option>
        </select>
    )
  }
}

ReactDOM.render(
    React.createElement(CategoryBox, null),
    document.getElementById('example')
);
