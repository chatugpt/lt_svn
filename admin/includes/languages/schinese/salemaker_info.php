<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
//  $Id: salemaker_info.php 1105 2005-04-04 22:05:35Z birdbrain $
//

define('HEADING_TITLE', '销售商');
define('SUBHEADING_TITLE', '销售商使用提示:');
define('INFO_TEXT', '<ul>
                      <li>
                        始终使用 \'.\' 作为小数点扣和价格范围.
                      </li>
                      <li>
                       当你创建/编辑产品时输入相同的货币数额时.
                      </li>
                      <li>
                        在扣除字段，您可以输入金额或百分比扣除，
                        或更换价格. (例如. 扣除 $5.00 从所有价格中, 扣除 10% 从所有价格或所有改变价格中 $25.00)
                      </li>
                      <li>
                       进入一个价格范围缩小了产品范围将受到影响. (例如.
                        产品从 $50.00 到 $150.00)
                      </li>
                      <li>
                        您必须选择要采取的动作，如果一个产品是一种特价的 <i>和</i> 受此次出售:
						<ul>
                          <li>
                            <strong>忽略特价商品价格 - 适用于产品价格和替换特殊</strong><br>
							此次出售扣将被应用到产品的正常价格.
                            (如.正常价格 $10.00, 特价商品价格 $9.50, 销售条件是 10%.
							该产品\'的最终价格将显示 $9.00 发售. 被忽略的特价商品价格.)
                          </li>
                          <li>
                            <strong>忽略销售条件 - 没有出售时适用特别存在</strong><br>
                            此次出售将不会被扣除用于特价商品. 特餐价格将显示一样
                            当存在销售定义. (如. 正常价格 $10.00, 特价商品价格是 $9.50,
                            销售条件是 10%. 该产品\'的最终价格将显示 $9.50 发售.
                            被忽略的销售条件.)
                          </li>
                          <li>
                            <strong>特别适用于中扣除销售价格 - 否则适用于价格</strong><br>
                            此次出售扣将被应用到特价商品的价格。复合型的价格将显示.
                            (如. 正常价格 $10.00, 特价商品价格是 $9.50, 销售条件是 10%. 该产品\'的最终价格将显示 $8.55. 一个额外的 10% 关闭特价商品价格.)
                          </li>
                        </ul>
                      </li>
                      <li>
                       离开空的开始日期将立即开始发售.
                      </li>
                      <li>
                        给空的结束日期，如果你不想出售过期.</li>
                      <li>
                        检查一类自动包含子类别.
                      </li>
                    </ul>');
define('TEXT_CLOSE_WINDOW', '[ 关闭窗口 ]');
?>