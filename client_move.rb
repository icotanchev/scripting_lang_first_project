require 'rubygems'
require 'active_record'
require 'activerecord-jdbc-adapter'
require 'jdbc/mysql'
require 'java'

ActiveRecord::Base.establish_connection(adapter: 'mysql', database: 'script_lang_first', username: 'root', encoding: 'utf8', socket: '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock')

class TblClient < ActiveRecord::Base
	self.table_name = 'tbl_client'
end

while true 
	TblClient.find_each do |client|
		updateposition = "update tbl_client set position = ST_GEOMFROMTEXT('POINT(#{rand(42.62503091911922..42.753228239088024)} #{rand(23.24535369873047..23.436927795410156)})') where id = #{client.id}"
		ActiveRecord::Base.connection.execute(updateposition)
	end

	sleep(10)
end

