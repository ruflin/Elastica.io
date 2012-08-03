# Elastica debian image
# 
# All passwords and username (db, ...) are root / root
#
# The image has 2GB of memory and a size of 10GB

Vagrant::Config.run do |config|
	config.vm.box = "debian-6.0.3-64-elastica-20120211"
	config.vm.box_url = "http://ruflin.com/files/vagrant/debian-6.0.3-64-elastica-20120211.box"
	config.vm.network :hostonly, "10.10.10.10"
	config.vm.share_folder("www", "/var/www", ".")
	config.vm.customize [
    	  "modifyvm", :id,
    	  "--memory", "2048"
      ]
end
