// SPDX-FileCopyrightText: Marcel Klehr <mklehr@gmx.net>
// SPDX-License-Identifier: AGPL-3.0-or-later
const webpackConfig = require('@nextcloud/webpack-vue-config')
const path = require("path");

module.exports = webpackConfig
webpackConfig.entry.admin = path.join(__dirname, 'src', 'admin.js')
