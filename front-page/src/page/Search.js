import react from 'react';
import { Input, Row, Col, List, Avatar, Pagination } from 'antd';
import { connect } from 'dva';
import search from '../model/search';

const namespace = 'search';

const mapStateToProps = (state) => {
    const searchResult = state[namespace];
    return {
        searchResult: searchResult.data,
        size: searchResult.size,
        keyword: searchResult.keyword,
        page: searchResult.page
    }
}

const mapDispatchToProps = (dispatch) => {
    return {
        onSearch: (keyword) => {
            const action = {
                type: `${namespace}/querySearch`,
                payload: keyword
            };
            dispatch(action);
        },

        onChangePage: (page) => {
            const action = {
                type: `${namespace}/page`,
                payload: page
            };
            dispatch(action);
        }
    }
}

@connect(mapStateToProps, mapDispatchToProps)

class Search extends react.Component {

    constructor(props) {
        super(props);
        // console.log(this.props.page);
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
                {/* row of search input */}
                <Row
                    type="flex"
                    justify="start"
                    align="middle"
                    style={
                        { height: '10vh' }
                    }>
                    <Col offset={1}>
                        <Search style={style}
                            placeholder={this.props.keyword}
                            enterButton size='large'
                            onSearch={
                                (value) => {
                                    this.props.onSearch(value);
                                    // this.onSearch(value);
                                }
                            }
                        />
                    </Col>
                </Row>
                {/* row of description */}
                <Row>
                    <Col offset={1}>
                        <p> {this.props.size} 条记录，当前第 {this.props.page} 页 </p>
                    </Col>
                </Row>
                <hr />
                {/* row of searchResult */}
                <Row>
                    <Col style={
                        {
                            margin: '20px 50px'
                        }
                    }>
                        <List itemLayout='horizontal'
                            dataSource={this.props.searchResult}
                            pagination={
                                {
                                    position: 'top',
                                    pageSize: 8,
                                    onChange: (value) => {
                                        this.props.onChangePage(value)
                                    },
                                    current: this.props.page,
                                    total: this.props.size

                                }
                            }
                            renderItem={
                                item => (<List.Item>
                                    <List.Item.Meta avatar={< Avatar size='large'
                                        icon='book' />
                                    }
                                        title={item.title}
                                        description={item.path}
                                    />
                                    {item.content}
                                </List.Item>
                                )
                            }
                        />
                    </Col>
                </Row>
            </div>
        );
    }
}

export default Search;