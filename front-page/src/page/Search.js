import react from 'react';
import { Input, Row, Col, List, Icon, Avatar } from 'antd';

class Search extends react.Component {
    constructor(props) {
        super(props);
        this.state = {
            data: [
                {
                    title: 'Ant Design Title 1',
                },
                {
                    title: 'Ant Design Title 2',
                },
                {
                    title: 'Ant Design Title 3',
                },
                {
                    title: 'Ant Design Title 4',
                },
                {
                    title: 'Ant Design Title 4',
                },
                {
                    title: 'Ant Design Title 4',
                },
                {
                    title: 'Ant Design Title 4',
                },
                {
                    title: 'Ant Design Title 4',
                },
                {
                    title: 'Ant Design Title 4',
                },
                {
                    title: 'Ant Design Title 4',
                },
            ]
        }
    }
    render() {
        const Search = Input.Search;
        const style = {
            width: '50vw',
            boxShadow: '0 4px 8px 0 rgba(0, 0, 0, 0.2)',
            border: '1px solid #e8e8e8',
        };
        return (
            <div>
                {/* row of input */}
                <Row type="flex" justify="start" align="middle" style={{ height: '12vh' }}>
                    <Col offset={1}>
                        <Search
                            style={style}
                            placeholder='请输入搜索内容'
                            enterButton
                            size='large'
                            onSearch={
                                (value) => {
                                    console.log(value);
                                }
                            }
                        />
                    </Col>
                </Row>
                <Row>
                    <Col offset={1}>
                        <p>10条记录，共5页，第1页</p>
                    </Col>
                </Row>
                <hr />
                <Row>
                    <Col>
                        <List
                            style={{ margin: '30px' }}
                            itemLayout="horizontal"
                            dataSource={this.state.data}
                            renderItem={item => (
                                <List.Item>
                                    <List.Item.Meta
                                        avatar={<Avatar size={48} icon="book" />}
                                        title={<a href="https://ant.design">{item.title}</a>}
                                        description="Ant Design, a design language for background applications, is refined by Ant UED Team"
                                    />
                                </List.Item>
                            )}
                        />
                    </Col>
                </Row>
            </div>
        );
    }
}

export default Search;