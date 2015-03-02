# Automates theme dependency installation and updating
all:
	@npm install
	@bower install
	@gulp

update:
	@npm update
	@bower update
